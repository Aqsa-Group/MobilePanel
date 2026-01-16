<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UserForm as UserFormModel;
use Illuminate\Support\Facades\Hash;
class UserForm extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $name, $username, $email, $password;
    public $number, $address, $rule, $limit;
    public $image, $userId;
    protected $rules = [
        'name' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'username' => 'required|unique:user_forms',
        'email' => 'required|email|unique:user_forms',
        'password' => 'required|min:6',
        'number' => 'required|regex:/^07[0-9]{8}$/',
        'address' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'rule' => 'required|in:admin,user',
        'limit' => 'required|in:محدود,بدون محدودیت',
        'image' => 'required|image|max:2048',
    ];
    protected $messages = [
        'name.required' => '* وارد کردن نام الزامی است',
        'name.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'username.required' => ' * نام کاربری الزامی است',
        'username.unique' => '* این نام کاربری قبلاً ثبت شده',
        'email.required' => ' * ایمیل الزامی است',
        'email.email' => ' * فرمت ایمیل صحیح نیست',
        'email.unique' => ' * این ایمیل قبلاً ثبت شده',
        'password.required' => ' * رمز عبور الزامی است',
        'password.min' => ' * رمز عبور باید حداقل ۶ کاراکتر باشد',
        'number.required' => ' * شماره تماس الزامی است',
        'number.regex' => 'شماره تماس باید با 07 شروع شود و 10 رقم باشد',
        'address.required' => ' * آدرس الزامی است',
        'address.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'rule.required' => 'انتخاب نقش الزامی است',
        'limit.required' => ' * محدودیت الزامی است',
        'image.required' => ' * لطفا یک تصویر وارد کنید',
        'image.image' => ' * فایل باید تصویر باشد',
        'image.max' => ' * حجم تصویر نباید بیشتر از ۲ مگابایت باشد',
    ];
    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'image' => 'required|nullable|image|max:2048',
                'name' => ['required', 'regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u'],
                'address' => ['required', 'regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u'],
                'number' => ['required', 'regex:/^07[0-9]{8}$/'],
                'email' => 'required|email',
            ]);
        }
        if ($this->step == 2) {
            $this->validate([
                'username' => 'required|unique:user_forms',
                'rule' => 'required|in:admin,user',
                'password' => 'required|min:6',
                'limit' => 'required|in:محدود,بدون محدودیت',
            ]);
        }
        $this->step++;
    }
    public function previousStep()
    {
        $this->step--;
    }
    public function submit()
    {
        $this->validate();
        $imagePath = $this->image
            ? $this->image->store('users', 'public')
            : null;
        UserFormModel::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'number' => $this->number,
            'address' => $this->address,
            'rule' => $this->rule,
            'limit' => $this->limit,
            'image' => $imagePath,
        ]);
          return redirect()->route('user.list')
        ->with('success', 'اطلاعات با موفقیت ثبت شد ✅');
    }
    public function render()
    {
        return view('livewire.mobile.user-form');
    }
}
