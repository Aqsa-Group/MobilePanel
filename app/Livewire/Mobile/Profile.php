<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
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
    protected function rules()
    {
        return [
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
            'number'   => ['required', 'regex:/^07\d{8}$/', 'unique:users,number,' . Auth::id()],
            'address'  => 'required|string|max:255',
            'image'    => 'nullable|image|max:2048',
            'password' => 'nullable|min:6',
        ];
    }
    public function save()
    {
        $this->number   = $this->convertPersianNumbers($this->number);
        $this->password = $this->convertPersianNumbers($this->password);
        $this->validate();
        $user = Auth::user();
        $data = [
            'name'     => $this->name,
            'username' => $this->username,
            'email'    => $this->email,
            'number'   => $this->number,
            'address'  => $this->address,
        ];
        if ($this->image) {
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }
            $data['image'] = $this->compressAndStoreImage($this->image);
        }
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }
        $user->update($data);
        session()->flash('success', 'پروفایل با موفقیت بروزرسانی شد ✅');
        return redirect()->route('welcome');
    }
protected function convertPersianNumbers($string)
{
    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $english = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace($persian, $english, $string);
}
    public function cancel()
    {
        $this->resetForm();
        return redirect()->route('welcome');
    }
    public function mount()
{
    $user = auth()->user();
    $this->name = $user->name;
    $this->username = $user->username;
    $this->email = $user->email;
    $this->number = $user->number;
    $this->address = $user->address;
    $this->oldImage = $user->image;
}
    protected function resetForm()
    {
        $user = Auth::user();
        $this->name     = $user->name;
        $this->username = $user->username;
        $this->email    = $user->email;
        $this->number   = $user->number;
        $this->address  = $user->address;
        $this->oldImage = $user->image;
        $this->image    = null;
        $this->password = null;
    }
    protected function compressAndStoreImage($image)
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image->getRealPath());
        $img->scaleDown(width: 800);
        $filename = 'users/' . uniqid() . '.jpg';
        Storage::disk('public')->put(
            $filename,
            $img->toJpeg(quality: 85)
        );
        return $filename;
    }
    public function render()
    {
        return view('livewire.mobile.profile')
            ->layout('Mobile.layouts.app');
    }
}
