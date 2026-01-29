<?php

namespace App\Livewire\Mobile;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Customer;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class SellForm extends Component
{
    use WithFileUploads;
public $searchName = '';
public $customersList = [];
public $selectedCustomerId = null;
public $customer_id;
    public $name;
    public $phone;
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
    'searchName' => 'required',
    'phone' => 'required',
    'model' => 'required',
    'price' => 'required|numeric',
];

    // 🔥 وقتی شماره تلفن تغییر کرد
    public function updatedPhone()
    {
        $customer = Customer::where('phone', $this->phone)->first();

        if ($customer) {
            $this->name = $customer->name;
            $this->id_card = $customer->id_card;
            $this->address = $customer->address;
        }
    }
public function updatedSearchName()
{
    if (strlen($this->searchName) < 2) {
        $this->customersList = [];
        return;
    }

    $this->customersList = Customer::where('name', 'like', '%' . $this->searchName . '%')
        ->orWhere('phone', 'like', '%' . $this->searchName . '%')
        ->limit(5)
        ->get();
}

public function selectCustomer($id)
{
    $customer = Customer::find($id);

    if (!$customer) return;

    $this->customer_id = $customer->id;
    $this->searchName  = $customer->name;
    $this->phone       = $customer->phone;
    $this->id_card     = $customer->id_card;
    $this->address     = $customer->address;

    $this->customersList = [];
}


   public function submit()
{
    $this->validate();

    DB::transaction(function () {

    $customer = Customer::firstOrCreate(
        ['phone' => $this->phone],
        [
            'name' => $this->searchName,
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

    session()->flash('success', 'فروش موفقانه ثبت شد');
    $this->reset();
}
    public function render()
    {
        return view('livewire.mobile.sellform');
    }
}
