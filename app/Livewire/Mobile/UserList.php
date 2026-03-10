<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\UserForm as User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class UserList extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'tailwind';
    public $showMaxModal = false;
    public $image;
    public $oldImage;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $number;
    public $address;
    public $rule;
    public $limit;
    public $password;
    public $search = '';
    public $confirmingDelete = false;
    public $deleteUserId = null;
    public $editMode = false;
    public $editingUser = null;
    public $userId = null;
    public $formResetKey;

    public function mount()
    {
        $this->formResetKey = uniqid('', true);
    }
    protected function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . $this->userId,
            'email'      => 'required|email|unique:users,email,' . $this->userId,
            'number'     => ['required', 'regex:/^07\d{8}$/', 'unique:users,number,' . $this->userId],
            'address'    => 'required|string|max:255',
            'rule'       => 'required',
            'image'      => 'nullable|image|max:2048',
        ];
        if (auth()->user()->rule === 'super_admin' && $this->rule === 'admin') {
            $rules['limit'] = 'required|integer|in:5,10';
        }
        if (!$this->userId) {
            $rules['password'] = 'required|min:6';
        } elseif ($this->password) {
            $rules['password'] = 'min:6';
        }
        return $rules;
    }
    protected function messages()
    {
        return [
            'first_name.required' => 'لطفاً نام را وارد کنید',
            'last_name.required'  => 'لطفاً نام خانوادگی را وارد کنید',
            'username.required'   => 'نام کاربری الزامی است',
            'username.unique'     => 'این نام کاربری قبلاً استفاده شده است',
            'email.required'      => 'لطفاً ایمیل را وارد کنید',
            'email.email'         => 'ایمیل معتبر نیست',
            'email.unique'        => 'این ایمیل قبلاً استفاده شده است',
            'number.required'     => 'شماره تماس الزامی است',
            'number.regex'        => 'شماره تماس باید با 07 شروع شود و ۱۰ رقم باشد',
            'address.required'    => 'لطفاً آدرس را وارد کنید',
            'address.max'         => 'آدرس طولانی است',
            'rule.required'       => 'انتخاب نقش کاربر الزامی است',
            'password.required'   => 'رمز عبور الزامی است',
            'password.min'        => 'رمز عبور باید حداقل 6 کاراکتر باشد',
            'limit.required'      => 'حداکثر تعداد الزامی است',
            'limit.in'            => 'حداکثر تعداد باید 5 یا 10 باشد',
        ];
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected function convertPersianNumbersToEnglish($input)
    {
        if ($input === null || $input === '') return $input;
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persianNumbers, $englishNumbers, (string)$input);
    }
    public function submit()
    {
        $this->number = $this->convertPersianNumbersToEnglish($this->number);
        $this->limit  = $this->convertPersianNumbersToEnglish($this->limit);
        $this->validate();

        $imagePath = $this->userId ? $this->oldImage : null;
        if ($this->image && method_exists($this->image, 'getRealPath')) {
            $filename = $this->compressAndStoreImage($this->image);
            $imagePath = $filename;
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }
        }

        $data = [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'username'   => $this->username,
            'email'      => $this->email,
            'number'     => $this->number,
            'address'    => $this->address,
            'rule'       => $this->rule,
            'limit'      => $this->limit,
            'creator_id' => auth()->id(),
            'admin_id'   => auth()->user()?->id,
            'name'       => trim($this->first_name . ' ' . $this->last_name),
            'image'      => $imagePath,
        ];

        if ($this->userId) {
            if ($this->password) {
                $data['password'] = bcrypt($this->password);
            }
        } else {
            $data['password'] = bcrypt($this->password ?? '123456');
        }

        if ($this->userId) {
            $user = User::find($this->userId);
            if (!$user) {
                return;
            }
            $user->update($data);
            session()->flash('message', 'کاربر با موفقیت ویرایش شد');
            session()->flash('type', 'edit');
        } else {
            User::create($data);
            session()->flash('message', 'کاربر با موفقیت ایجاد شد');
            session()->flash('type', 'create');
        }

        $this->resetForm();
        $this->reset(['image', 'oldImage', 'editMode', 'userId']);
        $this->formResetKey = uniqid('', true);
    }

    protected function compressAndStoreImage($image)
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image->getRealPath());
        $img = $img->scaleDown(width: 800);

        Storage::disk('public')->makeDirectory('users');
        $filename = 'users/' . uniqid() . '.jpg';
        Storage::disk('public')->put($filename, (string)$img->toJpeg(85));

        return $filename;
    }

    public function editUser($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return;
        }

        $this->editMode = true;
        $this->userId = $user->id;
        $this->editingUser = $user;
        $this->first_name = $user->first_name;
        $this->last_name  = $user->last_name;
        $this->username   = $user->username;
        $this->email      = $user->email;
        $this->number     = $user->number;
        $this->address    = $user->address;
        $this->rule       = $user->rule;
        $this->limit      = $user->limit;
        $this->oldImage   = $user->image;
        $this->password   = null;
        $this->resetValidation();
        $this->formResetKey = uniqid('', true);
        $this->dispatch('scrollToUserForm');
    }

    public function cancelForm()
    {
        $this->resetForm();
        $this->reset(['image', 'oldImage', 'editMode', 'userId']);
        $this->resetValidation();
        $this->formResetKey = uniqid('', true);
    }

    public function resetForm()
    {
        $this->reset([
            'first_name',
            'last_name',
            'username',
            'email',
            'number',
            'address',
            'rule',
            'limit',
            'password',
            'image',
            'oldImage',
            'editMode',
            'userId'
        ]);
        $this->resetValidation();
    }
    public function confirmDelete($id)
    {
        $this->deleteUserId = $id;
        $this->confirmingDelete = true;
    }

    public function hideMaxModal()
    {
        $this->showMaxModal = false;
    }

    public function deleteConfirmed()
    {
        if (!$this->deleteUserId) {
            $this->confirmingDelete = false;
            return;
        }

        $user = User::findOrFail($this->deleteUserId);
        if ($user->image && Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();
        $this->confirmingDelete = false;
        $this->deleteUserId = null;
        session()->flash('message', 'کاربر حذف شد');
        session()->flash('type', 'delete');
    }
    public function render()
    {
        $authUser = Auth::user();
        if ($authUser->rule === 'super_admin') {
            $users = User::query()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('username', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->oldest()
                ->paginate(5);
            $canEdit = true;
        } elseif ($authUser->rule === 'admin') {
            $users = User::where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                    ->orWhere('username', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
            })->oldest()->paginate(5);
            $canEdit = true;
        } else {
            $users = User::query()->oldest()->paginate(5);
            $canEdit = false;
        }
        $editingUser = $this->userId ? User::find($this->userId) : null;
        return view('livewire.mobile.user-list', compact('users', 'editingUser', 'canEdit'));
    }
}
