<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\UserForm;
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
    protected function rules()
    {
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:user_forms,username,' . $this->userId,
            'email'      => 'required|email|unique:user_forms,email,' . $this->userId,
            'number'     => ['required', 'regex:/^07\d{8}$/', 'unique:user_forms,number,' . $this->userId],
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
    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected function convertPersianNumbersToEnglish($input)
    {
        $persianNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $englishNumbers = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persianNumbers, $englishNumbers, $input);
    }
    public function submit()
    {
        $authUser = Auth::user();
        if ($authUser->rule === 'admin') {
            $maxLimit = $authUser->limit;
            $count = UserForm::where('creator_id', $authUser->id)->count();
            if ($count >= $maxLimit && !$this->userId) {
                session()->flash('error', "شما فقط اجازه ساخت {$maxLimit} کاربر را دارید");
                return;
            }
        }
        $this->validate([
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,webp'
        ]);
        $this->number = $this->convertPersianNumbersToEnglish($this->number);
        $this->limit  = $this->convertPersianNumbersToEnglish($this->limit);
        $this->validate($this->rules(), $this->messages());
        if ($authUser->rule === 'admin' && $this->rule !== 'user') {
    session()->flash('error', 'شما اجازه ساخت این نقش را ندارید');
    return;
}

if ($authUser->rule === 'user') {
    session()->flash('error', 'شما اجازه انجام این عملیات را ندارید');
    return;
}

        if ($authUser->rule !== 'super_admin') {
            $this->limit = null;
        }
        $name = trim($this->first_name . ' ' . $this->last_name);
        $data = [
            'name'       => $name,
            'username'   => $this->username,
            'email'      => $this->email,
            'number'     => $this->number,
            'address'    => $this->address,
            'rule'       => $this->rule,
            'limit'      => $this->limit,
               'creator_id' => Auth::id(),
    'admin_id'   => auth()->user()->rule === 'super_admin'
                    ? Auth::id()
                    : auth()->user()->id,
        ];
if ($this->image instanceof \Livewire\TemporaryUploadedFile) {
    if ($this->userId && $this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
        Storage::disk('public')->delete($this->oldImage);
    }
    $data['image'] = $this->compressAndStoreImage($this->image);
} else {
    $data['image'] = $this->oldImage;
}
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }
        if ($this->userId) {
            UserForm::where('id', $this->userId)->update($data);
        } else {
            UserForm::create($data);
        }
        $this->resetForm();
        $this->reset(['image']);
        session()->flash('success', 'اطلاعات با موفقیت ذخیره شد');
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
}public function editUser($id)
{
    $user = UserForm::findOrFail($id);
    $this->editMode = true;
    $this->userId   = $user->id;
    $this->first_name = $user->first_name;
    $this->last_name  = $user->last_name;
    $this->username   = $user->username;
    $this->email      = $user->email;
    $this->number     = $user->number;
    $this->address    = $user->address;
    $this->rule       = $user->rule;
    $this->limit      = $user->limit;
    $this->password = null;
    $this->image    = null;
}
public function update()
{
    $this->validate();
    $user = UserForm::findOrFail($this->userId);
    $user->update([
        'first_name' => $this->first_name,
        'last_name'  => $this->last_name,
        'username'   => $this->username,
        'email'      => $this->email,
        'number'     => $this->number,
        'address'    => $this->address,
        'rule'       => $this->rule,
    ]);
    if ($this->password) {
        $user->update([
            'password' => bcrypt($this->password),
        ]);
    }
    $this->resetForm();
}
    public function cancelForm()
    {
        $this->resetForm();
        $this->reset(['image', 'oldImage']);
        $this->resetValidation();
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
        'userId',
        'editMode',
    ]);

    $this->resetValidation();
}

    public function confirmDelete($id)
    {
        $this->deleteUserId = $id;
        $this->confirmingDelete = true;
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
            'number.unique'       => 'این شماره قبلاً استفاده شده است',
            'number.regex'        => 'شماره تماس باید با 07 شروع شود و ۱۰ رقم باشد',
            'address.required'    => 'لطفاً آدرس را وارد کنید',
            'address.max'         => 'آدرس طولانی است',
            'rule.required'       => 'انتخاب نقش کاربر الزامی است',
            'password.required'   => 'رمز عبور الزامی است',
            'password.min'        => 'رمز عبور باید حداقل 6 کاراکتر باشد',
        ];
    }
    public function render()
    {
        $authUser = Auth::user();
        if ($authUser->rule === 'super_admin') {
            $users = UserForm::query()
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('username', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->oldest()
                ->paginate(5);
            $canEdit = true;
        } elseif ($authUser->rule === 'admin') {
            $users = UserForm::query()
                ->where('creator_id', $authUser->id)
                ->where(function($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                      ->orWhere('username', 'like', "%{$this->search}%")
                      ->orWhere('email', 'like', "%{$this->search}%");
                })
                ->oldest()
                ->paginate(5);
            $canEdit = true;
        } else {
            $users = UserForm::query()
                ->oldest()
                ->paginate(5);
            $canEdit = false;
        }
        $user = $this->userId ? UserForm::find($this->userId) : null;
        return view('livewire.mobile.user-list', compact('users', 'user', 'canEdit'));
    }
}
