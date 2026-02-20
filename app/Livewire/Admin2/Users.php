<?php
namespace App\Livewire\Admin2;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
#[Layout('livewire.admin2.layouts.app')]
class Users extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected string $paginationTheme = 'tailwind';
    public string $mode = 'create';
    public ?int $editingId = null;
    public $formResetKey = 0;
    public $search = '';
    public $user_count_added = null;
    public $name = '';
    public bool $confirmingDelete = false;
    public ?int $deleteId = null;
    public $last_name = '';
    public $user_name = '';
    public $email = '';
    public $password = '';
    public $phone_number = '';
    public $address = '';
    public $role;
    public $image;
    public $successMessage;
    public $usersCount;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    protected function messages()
{
    return [
        'name.required' => 'نام الزامی است.',
        'name.regex' => 'نام فقط باید شامل حروف فارسی/انگلیسی و فاصله باشد.',
        'last_name.regex' => 'نام خانوادگی فقط باید شامل حروف فارسی/انگلیسی و فاصله باشد.',
        'user_name.required' => 'نام کاربری الزامی است.',
        'user_name.unique' => 'این نام کاربری قبلاً ثبت شده است.',
        'email.required' => 'ایمیل الزامی است.',
        'email.email' => 'فرمت ایمیل صحیح نیست.',
        'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
        'password.required' => 'رمز عبور الزامی است.',
        'password.min' => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
        'phone_number.required' => 'شماره تماس الزامی است.',
        'phone_number.unique' => 'این شماره تماس قبلاً ثبت شده است.',
        'phone_number.regex' => 'شماره تماس باید با 07 شروع شود و دقیقاً ۱۰ رقم باشد (مثل 0712345678).',
        'address.required' => 'آدرس الزامی است.',
        'address.string' => 'آدرس باید متن باشد.',
        'role.required' => 'نقش کاربر الزامی است.',
        'role.in' => 'نقش انتخاب‌شده معتبر نیست.',
        'image.image' => 'فایل انتخاب‌شده باید تصویر باشد.',
        'image.max' => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
        'user_count_added.in' => 'تعداد مجاز ساخت کاربر فقط می‌تواند ۵ یا ۱۰ باشد.',
    ];
}
    private function faToEnDigits($value)
    {
    if ($value === null) return null;
    $fa = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    $en = ['0','1','2','3','4','5','6','7','8','9','0','1','2','3','4','5','6','7','8','9'];
    return str_replace($fa, $en, (string)$value);
}
private function normalizeInputs()
{
    $this->phone_number = $this->faToEnDigits($this->phone_number);
    $this->user_count_added = $this->faToEnDigits($this->user_count_added);
}
public function delete($id)
{
    $this->deleteId = (int) $id;
    $this->confirmingDelete = true;
}
public function deleteConfirmed()
{
    if (!$this->deleteId) return;
    User::findOrFail($this->deleteId)->delete();
    $this->confirmingDelete = false;
    $this->deleteId = null;
    session()->flash('message', 'کاربر با موفقیت حذف شد');
session()->flash('type', 'delete');
}
    protected function rules()
{
    $authRole = strtolower(auth()->user()?->role ?? 'user');
    $allowedRoles = ['user'];
    if ($authRole === 'super_admin') {
        $allowedRoles = ['user','admin'];
    }
    return [
        'name' => ['required', 'regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u'],
        'last_name' => ['nullable', 'regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u'],
        'user_name' => ['required', Rule::unique('users_list', 'user_name')->ignore($this->editingId)],
        'email' => ['required', 'email', Rule::unique('users_list', 'email')->ignore($this->editingId)],
        'password' => $this->mode === 'create' ? ['required', 'min:6'] : ['nullable', 'min:6'],
        'phone_number' => ['required', Rule::unique('users_list', 'phone_number')->ignore($this->editingId), 'regex:/^07[0-9]{8}$/'],
        'address' => ['required', 'string'],
        'role' => ['required', Rule::in($allowedRoles)],
        'image' => $this->mode === 'create' ? 'nullable|image|max:2048' : 'nullable|image|max:2048',
       'user_count_added' => $authRole === 'super_admin'
    ? ['nullable', Rule::in([5,10])]
    : ['nullable'],
    ];
}
   public function mount()
{
    $this->usersCount = User::count();
    $this->role = strtolower(auth()->user()?->role ?? 'user');
    $authRole = strtolower(auth()->user()?->role ?? 'user');
    if ($authRole === 'admin') {
        $this->role = 'user';
    }
    if ($authRole === 'super_admin') {
        $this->role = 'user';
    }
}
    public function resetForm($keepMode = false)
    {
        $this->reset(['name', 'last_name', 'user_name', 'email', 'password', 'phone_number', 'address', 'role', 'image','user_count_added' ]);
        $this->resetValidation();
        if (!$keepMode) {
            $this->mode = 'create';
            $this->editingId = null;
            $this->formResetKey++;
        }
    }
    public function save()
    {
         $auth = auth()->user();
    $authRole = strtolower($auth?->role ?? 'user');
    if ($authRole === 'user') {
        $this->addError('permission', 'شما اجازه ایجاد کاربر را ندارید.');
        return;
    }
    if ($authRole === 'admin') {
        $this->role = 'user';
        $this->user_count_added = null;
    }
    if ($authRole === 'super_admin' && $this->role !== 'admin') {
    $this->user_count_added = null;
}
        if ($this->mode === 'create' && auth()->user()->role === User::ROLE_ADMIN) {
            $createdCount = auth()->user()->createdUsers()->count();
            if ($createdCount >= 10) {
                $this->addError('permission', 'شما اجازه ایجاد بیش از 10 کاربر را ندارید.');
                return;
            }
        }
        $this->normalizeInputs();
        $this->validate();
        if ($this->mode === 'edit') {
            $user = User::findOrFail($this->editingId);
            $user->update([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'user_name' => $this->user_name,
                'email' => $this->email,
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'role' => $this->role,
            ]);
            if (strtolower(auth()->user()?->role) === 'super_admin' && $user->role === 'admin') {
    $user->update([
        'user_limit' => $this->user_count_added !== null ? (int)$this->user_count_added : null,
    ]);
}
            if ($this->password) $user->update(['password' => bcrypt($this->password)]);
            if ($this->image) $user->update(['image' => $this->image->store('users', 'public')]);
            session()->flash('message', 'ویرایش با موفقیت انجام شد');
session()->flash('type', 'edit');
            $this->resetForm();
       } else {
    $created = User::create([
        'name' => $this->name,
        'last_name' => $this->last_name,
        'user_name' => $this->user_name,
        'email' => $this->email,
        'password' => bcrypt($this->password),
        'phone_number' => $this->phone_number,
        'address' => $this->address,
        'role' => $this->role,
        'image' => $this->image ? $this->image->store('users', 'public') : null,
        'created_by' => auth()->user()?->id
    ]);
    if (strtolower(auth()->user()?->role) === 'super_admin' && $created->role === 'admin') {
        $created->update([
            'user_limit' => $this->user_count_added !== null ? (int)$this->user_count_added : null,
        ]);
    }
    session()->flash('message', 'کاربر با موفقیت ایجاد شد');
session()->flash('type', 'create');
    $this->resetForm();
}
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->mode = 'edit';
        $this->editingId = $user->id;
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->user_name = $user->user_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->address = $user->address;
        $this->role = $user->role;
        $this->dispatch('scrollToTop');
if (strtolower(auth()->user()?->role) === 'admin') {
    $this->role = 'user';
}
if (strtolower(auth()->user()?->role) === 'super_admin') {
    $this->user_count_added = $user->user_limit ?? null;
} else {
    $this->user_count_added = null;
}
        $this->password = '';
        $this->image = null;
    }
    public function cancel()
    {
        if ($this->mode === 'edit' && $this->editingId) {
            $this->resetForm();
        } else {
            $this->resetForm();
        }
    }
  public function render()
{
    $users = User::query()
     ->with('creator')
        ->when($this->search, function ($q) {
            $q->where(function ($qq) {
                $qq->where('name', 'like', "%{$this->search}%")
                   ->orWhere('last_name', 'like', "%{$this->search}%")
                   ->orWhere('user_name', 'like', "%{$this->search}%")
                   ->orWhere('email', 'like', "%{$this->search}%");
            });
        })
        ->oldest()
        ->paginate(5);
    return view('livewire.admin2.component.users', compact('users'));
}
}
