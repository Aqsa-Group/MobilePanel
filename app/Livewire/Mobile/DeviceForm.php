<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Device;

class DeviceForm extends Component
{
    use WithFileUploads;
    public $category;
    public $brand;
    public $status;
    public $model;
    public $memory;
    public $color;


    protected $rules = [
        'category' => 'required|string',
        'brand'    => 'required|string',
        'status'   => 'required|string',
        'model'    => 'required|string|max:255',
        'memory'   => 'required|string|max:50',
        'color'    => 'required|string|max:50',
    ];
      protected $messages = [
        'category.required' => 'انتخاب کتگوری الزامی است',
        'brand.required'    => 'انتخاب برند الزامی است',
        'status.required'   => 'انتخاب وضعیت الزامی است',
        'model.required'    => 'مدل دستگاه را وارد کنید',
        'memory.required'   => 'حافظه را وارد کنید',
        'color.required'    => 'رنگ را وارد کنید',
    ];


     public function nextStep()
    {
        $this->validate();


            session([
            'device-form' => [
                'category' => $this->category,
                'brand'    => $this->brand,
                'status'   => $this->status,
                'model'    => $this->model,
                'memory'   => $this->memory,
                'color'    => $this->color,
            ]
        ]);


        return redirect()->to('/device-form2');
    }

    public function render()
    {
        return view('livewire.mobile.device-form')
            ->layout('Mobile.layouts.app');
    }
}
