<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CustomerRecord;
use Illuminate\Support\Facades\Auth;
class Customer extends Component
{
    use WithFileUploads;
    public $fullname;
    public $address;
    public $customer_type;
    public $id_card;
    public $customer_number;
    public $image;
    public $successMessage;
    public $step = 1;
    private function convertToEnglishNumber($value)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];

        return str_replace($persian, $english, $value);
    }
    protected $rules = [
        'fullname' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'address'  => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'customer_type' => 'required|in:مشتری جدید,مشتری همیشه گی',
        'customer_number' => 'required|regex:/^07[0-9]{8}$/',
        'id_card' => 'required|regex:/^\d{5}[-\s]?\d{5}$/|unique:customers,id_card',
        'image' => 'required|image|max:2048',
    ];
    protected $messages = [
        'fullname.required' => '* وارد کردن نام الزامی است',
        'fullname.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'address.required' => ' * آدرس الزامی است',
        'address.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'customer_type.required' => '*انتخاب نوعیت مشتری الزامی میباشد',
        'customer_number.required' => '* شماره تماس الزامی است ',
        'customer_number.regex' => 'شماره تماس باید با 07 شروع شود و 10 رقم باشد',
        'id_card.required' => '*وارد کردن آیدی تذکره الزامی میباشد',
        'id_card.regex' => 'فرمت نادرست!',
        'id_card.unique' => 'این شماره تذکره قبلاً ثبت شده است',
        'image.required' => '* لطفا یک تصویر وارد کنید',
        'image.max' => ' * حجم تصویر نباید بیشتر از ۲ مگابایت باشد',
    ];
    public function nextStep()
    {
        if ($this->step == 1) {
        }
        $this->validate();
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
            ? $this->image->store('customer', 'public')
            : null;
        CustomerRecord::create([
            'fullname' => $this->fullname,
            'customer_type' => $this->customer_type,
            'customer_number' => $this->customer_number,
            'address' => $this->address,
            'id_card' => $this->id_card,
            'image' => $imagePath,
            'user_id'  => Auth::id(),
            'admin_id' => Auth::user()->admin_id ?? Auth::id(),
        ]);
        $this->reset([
            'fullname',
            'customer_type',
            'customer_number',
            'address',
            'id_card',
            'image',
        ]);
        return redirect()->route('customers');
    }
    public function render()
    {
        return view('livewire.mobile.customer');
    }
}
