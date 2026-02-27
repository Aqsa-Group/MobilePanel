<?php

namespace App\Livewire\Admin2;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $image;
    public $oldImage;
    public $name;
    public $username;
    public $email;
    public $number;
    public $address;
    public $password;

    public function mount(): void
    {
        $admin = Auth::guard('admin2')->user();
        if (!$admin) {
            abort(403);
        }

        $this->name = $admin->name;
        $this->username = $admin->user_name;
        $this->email = $admin->email;
        $this->number = $admin->phone_number;
        $this->address = $admin->address;
        $this->oldImage = $admin->image;
    }

    protected function rules(): array
    {
        $adminId = (int) Auth::guard('admin2')->id();

        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users_list,user_name,' . $adminId,
            'email' => 'required|email|max:255|unique:users_list,email,' . $adminId,
            'number' => ['required', 'regex:/^07\d{8}$/', 'unique:users_list,phone_number,' . $adminId],
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'password' => 'nullable|min:6',
        ];
    }

    public function save()
    {
        $this->number = $this->convertToEnglishDigits((string) $this->number);
        $this->password = $this->convertToEnglishDigits((string) $this->password);

        $this->validate();

        $admin = Auth::guard('admin2')->user();
        if (!$admin) {
            abort(403);
        }

        $data = [
            'name' => $this->name,
            'user_name' => $this->username,
            'email' => $this->email,
            'phone_number' => $this->number,
            'address' => $this->address,
        ];

        if ($this->image) {
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }

            $data['image'] = $this->compressAndStoreImage($this->image);
        }

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $admin->update($data);

        $this->oldImage = $admin->image;
        $this->image = null;
        $this->password = null;

        session()->flash('success', 'پروفایل مدیریت با موفقیت بروزرسانی شد.');

        return redirect()->route('admin2.dashboard');
    }

    public function cancel()
    {
        $this->resetForm();

        return redirect()->route('admin2.dashboard');
    }

    protected function resetForm(): void
    {
        $admin = Auth::guard('admin2')->user();
        if (!$admin) {
            return;
        }

        $this->name = $admin->name;
        $this->username = $admin->user_name;
        $this->email = $admin->email;
        $this->number = $admin->phone_number;
        $this->address = $admin->address;
        $this->oldImage = $admin->image;
        $this->image = null;
        $this->password = null;
    }

    protected function compressAndStoreImage($image): string
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image->getRealPath());
        $img->scaleDown(width: 800);

        $filename = 'admin2/' . uniqid() . '.jpg';

        Storage::disk('public')->put(
            $filename,
            $img->toJpeg(quality: 85)
        );

        return $filename;
    }

    protected function convertToEnglishDigits(string $value): string
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($arabic, $english, str_replace($persian, $english, $value));
    }

    public function render()
    {
        return view('livewire.admin2.pages.profile')->layout('livewire.admin2.layouts.app');
    }
}
