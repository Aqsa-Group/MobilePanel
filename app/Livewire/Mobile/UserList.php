<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\UserForm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UserList extends Component
{
    use WithPagination, WithFileUploads;
    use WithFileUploads;
    protected $paginationTheme = 'tailwind';
    public $image, $username, $email, $number, $address, $rule, $limit, $password;
    public $editingUserId = null;
    public $first_name;
    public $last_name;
    public $search = '';
    public $userId;
    public $name;
    public $confirmingDelete = false;
    public $deleteUserId = null;
    public function mount()
    {
        if (Auth::user()->rule === 'user') {
            abort(403);
        }
    }
    protected function rules()
    {
        $rules = [
            'image'    => 'nullable|image|max:2048',
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user_forms,username,' . $this->editingUserId,
            'email'    => 'nullable|email|unique:user_forms,email,' . $this->editingUserId,
            'number'   => 'nullable|string|max:30',
            'address'  => 'nullable|string|max:255',
            'rule'     => 'required',
            'limit'    => 'nullable|integer|min:1|max:5',
        ];
        if (!$this->editingUserId || $this->password) {
            $rules['password'] = 'required|min:6';
        }
        return $rules;
    }
public function creator()
{
    return $this->belongsTo(User::class, 'creator_id');
}
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function submit()
{
    if (Auth::user()->rule === 'user') {
        abort(403, 'شما اجازه اضافه کردن کاربر را ندارید');
    }
    if (Auth::user()->rule === 'admin' && !$this->userId) {
        $count = UserForm::where('creator_id', Auth::id())->count();
        if ($count >= 10) {
            session()->flash('error', 'شما به سقف اضافه کردن کاربران رسیده‌اید (حداکثر ۱۰ کاربر)');
            return;
        }
    }
    $this->validate([
        'first_name' => 'required',
        'last_name'  => 'required',
        'username'   => 'required',
        'rule'       => 'required',
        'password'   => $this->userId ? 'nullable|min:6' : 'required|min:6',
        'image'      => 'nullable|image|max:2048',
    ]);
    $name = trim($this->first_name . ' ' . $this->last_name);
    $creatorId = Auth::id();
    $data = [
        'name'       => $name,
        'username'   => $this->username,
        'email'      => $this->email,
        'number'     => $this->number,
        'address'    => $this->address,
        'rule'       => $this->rule,
        'limit'      => $this->limit,
        'creator_id' => $creatorId,
    ];
    if ($this->image) {
        $data['image'] = $this->image->store('users', 'public');
    }
    if ($this->password) {
        $data['password'] = bcrypt($this->password);
    }
    if ($this->userId) {
        UserForm::where('id', $this->userId)->update($data);
    } else {
        UserForm::create($data);
    }
    $this->resetForm();
    session()->flash('success', 'اطلاعات با موفقیت ذخیره شد');
}
public function editUser($id)
{
    $user = UserForm::findOrFail($id);
    $this->userId = $user->id;
    $nameParts = explode(' ', $user->name, 2);
    $this->first_name = $nameParts[0] ?? '';
    $this->last_name  = $nameParts[1] ?? '';
    $this->username = $user->username;
    $this->email    = $user->email;
    $this->number   = $user->number;
    $this->address  = $user->address;
    $this->rule     = $user->rule;
    $this->limit    = $user->limit;
}
    public function confirmDelete($id)
    {
        $this->deleteUserId = $id;
        $this->confirmingDelete = true;
    }
    public function resetForm()
{
    $this->reset([
        'editingUserId', 'image', 'name', 'username',
        'email', 'number', 'address', 'rule', 'limit', 'password',
        'first_name', 'last_name', 'userId',
    ]);
    $this->image = null;
    $this->resetValidation();
}
    public function deleteConfirmed()
    {
        $user = UserForm::findOrFail($this->deleteUserId);
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        $this->confirmingDelete = false;
        $this->deleteUserId = null;
        session()->flash('success', 'کاربر حذف شد');
    }
    public function render()
{
    if (Auth::user()->rule === 'super_admin') {
        $users = UserForm::query()
            ->where('name', 'like', "%{$this->search}%")
            ->orWhere('username', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->oldest()
            ->paginate(5);
    } elseif (Auth::user()->rule === 'admin') {
        $users = UserForm::query()
            ->where('creator_id', Auth::id())
            ->where(function($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('username', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%");
            })
            ->oldest()
            ->paginate(5);
    } else {
        $users = collect();
    }
    $user = $this->userId ? UserForm::find($this->userId) : null;
    return view('livewire.mobile.user-list', compact('users', 'user'));
}

}
