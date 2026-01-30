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
    public $searchName = '';
    public $customersList = [];
    public $customer_id;
    public $name;
    public $phone;
public $customer;
    public $id_card;
    public $address;
    public $customer_image;
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
        $this->customersList = [];
    }
    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $customer = Customer::firstOrCreate(
                ['customer_number' => $this->customer_number],
                [
                    'fullname' => $this->name,
                    'id_card' => $this->id_card,
                    'address' => $this->address,
                ]
            );
            if ($this->customer_image) {
                $customer->update([
                    'image_path' => $this->customer_image->store('customers', 'public')
                ]);
            }
            $sale = Sale::create([
                'customer_id' => $customer->id,
                'admin_id' => Auth::id(),
                'total_price' => $this->price,
            ]);
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
        $this->reset([
            'searchName', 'customersList', 'customer_id', 'name', 'phone', 'id_card', 'address',
            'category', 'model', 'color', 'serial', 'price', 'customer_image', 'device_image'
        ]);
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
