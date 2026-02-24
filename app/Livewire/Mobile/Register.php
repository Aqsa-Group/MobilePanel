<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RegisterDevice;

class Register extends Component
{
    use WithFileUploads;

    public $formKey;

    // Customer
    public $customer_name;
    public $customer_phone;
    public $customer_tazkira_id;
    public $customer_address;
    public $customer_image;
    public $tazkira_image;

    // Device
    public $category;
    public $model;
    public $color;
    public $carton_image;
    public $device_image;
    public $imei;

    public function mount()
    {
        $this->formKey = uniqid();
    }

    protected function rules()
    {
        return [
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_tazkira_id' => 'required',
            'customer_address' => 'required',
            'category' => 'required',
            'model' => 'required',
            'color' => 'required',
            'imei' => 'required|unique:registers,imei',
        ];
    }

    protected $messages = [
        'required' => 'فیلد :attribute الزامی است.',
        'unique'   => ':attribute قبلاً ثبت شده است.',
    ];

    protected $validationAttributes = [
        'customer_name' => 'نام کامل',
        'customer_phone' => 'شماره تماس',
        'customer_tazkira_id' => 'آیدی تذکره',
        'customer_address' => 'آدرس',
        'category' => 'کتگوری',
        'model' => 'مدل دستگاه',
        'color' => 'رنگ',
        'imei' => 'شماره IMEI',
    ];

    public function save()
    {
        $this->validate();

        RegisterDevice::create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_tazkira_id' => $this->customer_tazkira_id,
            'customer_address' => $this->customer_address,
            'category' => $this->category,
            'model' => $this->model,
            'color' => $this->color,
            'imei' => $this->imei,
            'customer_image' => $this->customer_image?->store('customers', 'public'),
            'tazkira_image' => $this->tazkira_image?->store('tazkira', 'public'),
            'carton_image' => $this->carton_image?->store('cartons', 'public'),
            'device_image' => $this->device_image?->store('devices', 'public'),
        ]);

        session()->flash('success', 'دستگاه موفقانه ثبت شد ✅');

        $this->resetForm();
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'customer_name',
            'customer_phone',
            'customer_tazkira_id',
            'customer_address',
            'customer_image',
            'tazkira_image',
            'category',
            'model',
            'color',
            'carton_image',
            'device_image',
            'imei',
        ]);

        $this->resetValidation();

        // 👇 این خط باعث ریفرش کامل فرم می‌شود
        $this->formKey = uniqid();
    }

    public function render()
    {
        return view('livewire.mobile.register');
    }
}
