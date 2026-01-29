<?php

namespace App\Livewire\Mobile;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class SellForm extends Component
{
    use WithFileUploads;

    // مشتری
    public $searchName = '';
    public $customersList = [];
    public $customer_id;
    public $name;
    public $phone;
public $customer;
    public $id_card;
    public $address;
    public $customer_image;

    // دستگاه
    public $category;
    public $model;
    public $color;
    public $serial;
    public $price;
    public $device_image;

    protected $rules = [
        'phone' => 'required',
        'name' => 'required',
        'model' => 'required',
        'price' => 'required|numeric',
    ];

    // وقتی شماره تلفن تغییر کرد، اطلاعات مشتری خودکار پر شود
    public function updatedPhone()
    {
        $customer = Customer::where('phone', $this->phone)->first();

        if ($customer) {
            $this->fill([
                'customer_id' => $customer->id,
                'name' => $customer->fullname,
                'id_card' => $customer->id_card,
                'address' => $customer->address,
            ]);
        } else {
            $this->customer_id = null;
            $this->name = '';
            $this->id_card = '';
            $this->address = '';
        }
    }

    // جستجوی مشتری با debounce روی فیلد نام
    public function updatedSearchName()
    {
        if (strlen($this->searchName) < 1) {
            $this->customersList = [];
            return;
        }

        $this->customersList = Customer::where('fullname', 'like', '%' . $this->searchName . '%')
            ->orWhere('phone', 'like', '%' . $this->searchName . '%')
            ->limit(5)
            ->get();
    }

    public function getCustomerImageProperty()
{
    if ($this->customer_image) {
        return $this->customer_image->temporaryUrl();
    }

    if ($this->customer_id) {
        $customer = Customer::find($this->customer_id);
        return $customer && $customer->image_path ? Storage::url($customer->image_path) : null;
    }

    return null;
}

    // وقتی مشتری از لیست انتخاب شد
    public function selectCustomer($id)
    {
        $customer = Customer::find($id);

        $this->customer_id = $id;
    $this->customer = Customer::find($id);
        if (!$customer) return;

        $this->fill([
            'customer_id' => $customer->id,
            'searchName' => $customer->fullname,
            'customer_number' => $customer->customer_number,
            'name' => $customer->fullname,
            'id_card' => $customer->id_card,
            'address' => $customer->address,
        ]);

        // لیست مشتریان را خالی کن تا مخفی شود
        $this->customersList = [];
    }

    // ثبت فروش و دستگاه
    public function submit()
    {
        $this->validate();

        DB::transaction(function () {
            // مشتری جدید یا موجود
            $customer = Customer::firstOrCreate(
                ['customer_number' => $this->customer_number],
                [
                    'fullname' => $this->name,
                    'id_card' => $this->id_card,
                    'address' => $this->address,
                ]
            );

            // ذخیره عکس مشتری
            if ($this->customer_image) {
                $customer->update([
                    'image_path' => $this->customer_image->store('customers', 'public')
                ]);
            }

            // ثبت فروش
            $sale = Sale::create([
                'customer_id' => $customer->id,
                'admin_id' => Auth::id(),
                'total_price' => $this->price,
            ]);

            // ثبت دستگاه
            Device::create([
                'category' => $this->category,
                'model' => $this->model,
                'color' => $this->color,
                'serial' => $this->serial,
                'price' => $this->price,
                'customer_id' => $customer->id,
                'sale_id' => $sale->id,
                'image_path' => $this->device_image ? $this->device_image->store('devices', 'public') : null,
            ]);
        });

        session()->flash('success', 'فروش و مشتری با موفقیت ثبت شد');

        // ریست فرم
        $this->reset([
            'searchName', 'customersList', 'customer_id', 'name', 'phone', 'id_card', 'address',
            'category', 'model', 'color', 'serial', 'price', 'customer_image', 'device_image'
        ]);

        // Emit event برای بروزرسانی لیست مشتریان در Livewire دیگر
        $this->emit('customerUpdated');
    }

    public function render()
    {
        $this->customersList = Customer::where('fullname', 'like', "%{$this->searchName}%")
    ->orWhere('customer_number', 'like', "%{$this->searchName}%")
    ->limit(5)
    ->get();
        return view('livewire.mobile.sellform');
    }
}
