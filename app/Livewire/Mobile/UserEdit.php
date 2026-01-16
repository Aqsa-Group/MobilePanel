<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\UserForm;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserEdit extends Component
{
    use WithFileUploads;
    public $name, $username, $email, $number, $address, $rule, $limit;
    public $user, $image, $password, $imagePath;
    protected $layout = 'components.layouts.app';
    public function mount($id)
    {
        $this->user = UserForm::findOrFail($id);
        $this->name = $this->user->name;
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->number = $this->user->number;
        $this->address = $this->user->address;
        $this->rule = $this->user->rule;
        $this->limit = $this->user->limit;
        $this->imagePath = $this->user->image;
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'username' => 'required|unique:user_forms,username,' . $this->user->id,
            'email' => 'required|email|unique:user_forms,email,' . $this->user->id,
            'password' => 'nullable|min:6',
            'number' => 'required|regex:/^07[0-9]{8}$/',
            'address' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'rule' => 'required|in:admin,user',
            'limit' => 'required|in:محدود,بدون محدودیت',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = $this->imagePath;
        if ($this->image) {
            if ($this->imagePath && Storage::disk('public')->exists($this->imagePath)) {
                Storage::disk('public')->delete($this->imagePath);
            }
            $imagePath = $this->image->store('users', 'public');
        }
        $this->user->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'number' => $this->number,
            'password' => $this->password
                ? Hash::make($this->password)
                : $this->user->password,
            'address' => $this->address,
            'rule' => $this->rule,
            'limit' => $this->limit,
            'image' => $imagePath,
        ]);
        session()->flash('success', 'اطلاعات با موفقیت ویرایش شد');
        return redirect()->route('user.list');
    }
    public function render()
    {
        return view('livewire.mobile.user-edit')->layout('Mobile.layouts.app');
    }
    }
