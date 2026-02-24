<?php

namespace App\Livewire\Website;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DeviceReport;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    use WithFileUploads;

    public $owner_full_name;
    public $owner_phone;
    public $owner_national_id;
    public $owner_photo;
    public $device_model;
    public $device_imei;
    public $device_image;
    public $store_name;
    public $incident_type;
    public $incident_location;
    public $incident_description;
    public $incident_date;
    public $formKey;



    protected function rules()
    {
        return [
            'owner_full_name'   => 'required|string|max:150',
            'owner_phone'       => 'required|string|max:20',
            'owner_national_id' => 'nullable|string|max:50',

            'device_model'      => 'required|string|max:150',
            'device_imei'       => 'required|digits:15|unique:device_reports,device_imei',

            'device_image'      => 'nullable|image|max:2048',
            'owner_photo'       => 'nullable|image|max:2048',

            'store_name'        => 'nullable|string|max:150',

            'incident_type'     => 'required|in:lost,stolen',
            'incident_location' => 'required|string|max:255',
            'incident_description' => 'nullable|string',
            'incident_date'     => 'nullable|date',
        ];
    }

    protected function messages()
    {
        return [
            'owner_full_name.required' => 'نام مالک الزامی است.',
            'owner_full_name.max' => 'نام مالک نباید بیشتر از ۱۵۰ کاراکتر باشد.',

            'owner_phone.required' => 'شماره تماس الزامی است.',
            'owner_phone.max' => 'شماره تماس معتبر نیست.',

            'owner_national_id.max' => 'آیدی تذکره معتبر نیست.',

            'device_model.required' => 'مدل دستگاه الزامی است.',
            'device_model.max' => 'مدل دستگاه بیش از حد طولانی است.',

            'device_imei.required' => 'شماره IMEI الزامی است.',
            'device_imei.digits' => 'شماره IMEI باید دقیقاً ۱۵ رقم باشد.',
            'device_imei.unique' => 'این IMEI قبلاً ثبت شده است.',

            'device_image.image' => 'فایل دستگاه باید تصویر باشد.',
            'device_image.max' => 'حجم تصویر دستگاه نباید بیشتر از ۲ مگابایت باشد.',

            'owner_photo.image' => 'عکس مالک باید تصویر باشد.',
            'owner_photo.max' => 'حجم عکس مالک نباید بیشتر از ۲ مگابایت باشد.',

            'incident_type.required' => 'نوع حادثه را انتخاب کنید.',
            'incident_type.in' => 'نوع حادثه معتبر نیست.',

            'incident_location.required' => 'محل وقوع حادثه الزامی است.',
            'incident_location.max' => 'محل وقوع حادثه بیش از حد طولانی است.',

            'incident_date.date' => 'تاریخ حادثه معتبر نیست.',
        ];
    }
    protected function validationAttributes()
    {
        return [
            'owner_full_name' => 'نام مالک',
            'owner_phone' => 'شماره تماس',
            'owner_national_id' => 'آیدی تذکره',
            'device_model' => 'مدل دستگاه',
            'device_imei' => 'شماره IMEI',
            'device_image' => 'عکس دستگاه',
            'owner_photo' => 'عکس مالک',
            'store_name' => 'نام فروشگاه',
            'incident_type' => 'نوع حادثه',
            'incident_location' => 'محل وقوع حادثه',
            'incident_description' => 'توضیحات',
            'incident_date' => 'تاریخ حادثه',
        ];
    }

    public function mount()
    {
        $this->formKey = uniqid();
        $this->user = Auth::user();
    }

    public function submit()
    {


        $this->validate();

        $deviceImagePath = null;
        $ownerPhotoPath  = null;

        if ($this->device_image) {
            $deviceImagePath = $this->device_image->store('device_images', 'public');
        }

        if ($this->owner_photo) {
            $ownerPhotoPath = $this->owner_photo->store('owner_photos', 'public');
        }

        DeviceReport::create(
            [
                'owner_full_name'   => $this->owner_full_name,
                'owner_phone'       => $this->owner_phone,
                'owner_national_id' => $this->owner_national_id,
                'owner_photo'       => $ownerPhotoPath,

                'device_model'      => $this->device_model,
                'device_imei'       => $this->device_imei,
                'device_image'      => $deviceImagePath,

                'store_name'        => $this->store_name,

                'incident_type'     => $this->incident_type,
                'incident_location' => $this->incident_location,
                'incident_description' => $this->incident_description,
                'incident_date'     => $this->incident_date,

                'ip_address' => Request::ip(),
                'user_agent' => Request::header('User-Agent'),

                'admin_id' => Auth::id(),
                'admin_name' => Auth::user()->name ?? null,
            ]
        );

        session()->flash('success', 'گزارش با موفقیت ثبت شد.');

        $this->resetForm();
    }
    public function resetForm()
    {
        $this->reset([
            'owner_full_name',
            'owner_phone',
            'owner_national_id',
            'owner_photo',
            'device_model',
            'device_imei',
            'device_image',
            'store_name',
            'incident_type',
            'incident_location',
            'incident_description',
            'incident_date',
        ]);
        $this->formKey = uniqid();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.website.register')->layout('livewire.website.layouts.app');
    }
}
