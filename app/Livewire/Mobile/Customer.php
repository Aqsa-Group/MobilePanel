<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CustomerRecord;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Customer extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'tailwind';
    public $first_name;
    public $last_name;
    public $address;
    public $customer_type;
    public $id_card;
    public $customer_number;
    public $image;
    public $oldImage;
    public $customerId = null;
    public $editing = false;
    public $search = '';
    public $filter = '';
    protected $rules = [
        'first_name' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'last_name' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'address' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'customer_type' => 'required|in:مشتری جدید,مشتری همیشه گی',
        'customer_number' => 'required|regex:/^07[0-9]{8}$/',
        'id_card' => 'required|regex:/^\d{4}-\d{4}-\d{5}$/|unique:customer_records,id_card',
        'image' => 'required|image|max:5120',
    ];
    protected $messages = [
        'first_name.required' => '* وارد کردن نام الزامی است',
        'first_name.regex' => '* فقط حروف مجاز است',
        'last_name.required' => '* وارد کردن تخلص الزامی است',
        'last_name.regex' => '* فقط حروف مجاز است',
        'address.required' => '* آدرس الزامی است',
        'address.regex' => '* فقط حروف مجاز است',
        'customer_type.required' => '* انتخاب نوعیت مشتری الزامی است',
        'customer_number.required' => '* شماره تماس الزامی است',
        'customer_number.regex' => 'شماره تماس باید با 07 شروع شود و ۱۰ رقم باشد',
        'id_card.required' => '* وارد کردن آیدی تذکره الزامی است',
        'id_card.regex' => 'فرمت نادرست!',
        'id_card.unique' => 'این شماره تذکره قبلاً ثبت شده است',
        'image.required' => '* وارد کردن عکس الزامی میباشد.',
        'image.max' => '* حجم تصویر نباید بیشتر از ۵ مگابایت باشد',
    ];
    private function convertToEnglishNumber($value)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persian, $english, $value);
    }
    public function updatedCustomerNumber($value)
    {
        $this->customer_number = $this->convertToEnglishNumber($value);
    }
    public function updatedIdCard($value)
    {
        $this->id_card = $this->convertToEnglishNumber($value);
    }
    public function mount($id = null)
{
    if ($id) {
        $this->editing = true;
        $this->customerId = $id;
        $customer = CustomerRecord::findOrFail($id);
        $this->first_name = $customer->first_name;
        $this->last_name  = $customer->last_name;
        $this->address    = $customer->address;
        $this->customer_number = $customer->customer_number;
        $this->customer_type   = $customer->customer_type;
        $this->id_card         = $customer->id_card;
        $this->oldImage        = $customer->image; // فقط یکبار مقداردهی
        $this->image           = null;
    }
}
public function submit()
{
    $rules = $this->rules;

    if ($this->editing && $this->customerId) {
        $rules['id_card'] = 'required|regex:/^\d{4}-\d{4}-\d{5}$/|unique:customer_records,id_card,' . $this->customerId;
        if (!($this->image instanceof \Livewire\TemporaryUploadedFile)) {
            unset($rules['image']);
        }
    }

    // اعتبارسنجی
    $this->validate($rules);

    // آپلود عکس اگر انتخاب شده بود
    if ($this->image instanceof \Livewire\TemporaryUploadedFile) {
        // حذف عکس قدیمی
        if ($this->editing && $this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
            Storage::disk('public')->delete($this->oldImage);
        }

        $imagePath = $this->image->store('customers', 'public'); // فولدر 'customers' همواره یکسان باشد
        $this->oldImage = $imagePath; // عکس جدید جایگزین oldImage شود
    } else {
        $imagePath = $this->oldImage; // اگر عکس جدید انتخاب نشده، عکس قبلی را نگه دار
    }

    CustomerRecord::updateOrCreate(
        ['id' => $this->customerId],
        [
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'fullname'   => trim($this->first_name . ' ' . $this->last_name),
            'customer_type' => $this->customer_type,
            'customer_number' => $this->convertToEnglishNumber($this->customer_number),
            'address' => $this->address,
            'id_card' => $this->convertToEnglishNumber($this->id_card),
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'admin_id' => Auth::user()->admin_id ?? Auth::id(),
        ]
    );

    session()->flash('success', $this->editing ? 'ویرایش شد' : 'ثبت شد');
    return redirect()->route('customers');
}
    public function resetForm()
    {
        $this->reset([
            'first_name','last_name','customer_type','customer_number','address','id_card','image'
        ]);
        $this->editing = false;
        $this->customerId = null;
        $this->oldImage = null;
        return redirect()->route('customers');
    }
  public function render()
{
    $customers = CustomerRecord::with('admin')
        ->when($this->search, function ($query) {
            $query->where('first_name', 'like', "%{$this->search}%")
                  ->orWhere('last_name', 'like', "%{$this->search}%")
                  ->orWhere('fullname', 'like', "%{$this->search}%")
                  ->orWhere('customer_number', 'like', "%{$this->search}%")
                  ->orWhere('id_card', 'like', "%{$this->search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(5);

    $this->customersCount = $customers->count();
return view('livewire.mobile.customer', [
    'customers' => $customers,
    'customersCount' => $customers->total(),
    ]);
}
}
