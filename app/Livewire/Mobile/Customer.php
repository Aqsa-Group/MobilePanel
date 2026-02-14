<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use App\Models\Customer as CustomerModel;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use function Livewire\store;
class Customer extends Component
{
    use WithFileUploads;
    protected $paginationTheme = 'tailwind';
    public $first_name, $last_name, $address, $customer_type, $id_card, $customer_number;
    public $image, $oldImage;
    public $customerId = null;
    public $editing = false;
    public $search = '';
    public $filter = '';
    public $name;
    public $CustomerCount;
 protected function rules()
{
    return [
        'first_name'      => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'last_name'       => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
        'address'         => 'required|regex:/^[A-Za-z0-9\x{0600}-\x{06FF}\s]+$/u',
        'customer_type'   => 'required|in:مشتری جدید,مشتری همیشه گی',
        'customer_number' => 'required|regex:/^07[0-9]{8}$/',
        'id_card'         => [
            'required',
            'regex:/^\d{4}-\d{4}-\d{5}$/',
            $this->customerId
                ? Rule::unique('customers', 'id_card')->ignore($this->customerId)
                : 'unique:customers,id_card'
        ],
        'image'           => 'nullable|image|max:5120',
    ];
}
    protected $messages = [
        'first_name.required' => '* وارد کردن نام الزامی است',
        'first_name.regex' => '* فقط حروف مجاز است',
        'last_name.required' => '* وارد کردن تخلص الزامی است',
        'last_name.regex' => '* فقط حروف مجاز است',
        'address.required' => '* آدرس الزامی است',
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
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian, $english, $value);
    }
    protected function compressAndStoreImage($image)
{
    $manager = new ImageManager(new Driver());
    $img = $manager->read($image->getRealPath());
    $img->resize(800, null, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
    Storage::disk('public')->makeDirectory('users');
    $filename = 'users/' . uniqid() . '.jpg';
    Storage::disk('public')->put(
        $filename,
        (string) $img->toJpeg(85)
    );
    return $filename;
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
            $customer = CustomerModel::find($id);
            if ($customer) {
                $this->first_name      = $customer->first_name;
                $this->last_name       = $customer->last_name;
                $this->customer_number = $customer->customer_number;
                $this->customer_type   = $customer->customer_type;
                $this->address         = $customer->address;
                $this->id_card         = $customer->id_card;
                $this->oldImage        = $customer->image;
                $this->image           = null;
            }
        } else {
            $this->editing = false;
        }
    }
    public function submit()
    {
        $this->validate();
        $imagePath = null;
if ($this->image) {
    if ($this->editing && $this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
        Storage::disk('public')->delete($this->oldImage);
    }
    $imagePath = $this->compressAndStoreImage($this->image);
}
        CustomerModel::updateOrCreate(
            ['id' => $this->customerId],
            [
                'first_name'      => $this->first_name,
                'last_name'       => $this->last_name,
                'fullname'        => trim($this->first_name . ' ' . $this->last_name),
                'customer_type'   => $this->customer_type,
                'customer_number' => $this->convertToEnglishNumber($this->customer_number),
                'address'         => $this->address,
                'id_card'         => $this->convertToEnglishNumber($this->id_card),
                'image'           => $imagePath,
                'admin_id'        => $this->customerId
                ? CustomerModel::find($this->customerId)->admin_id: Auth::id(),
            ]
        );
        session()->flash('success', $this->editing ? 'ویرایش شد' : 'ثبت شد');
        return redirect()->route('customers');
    }
    public function resetForm()
    {
        $this->reset([
            'first_name',
            'last_name',
            'customer_type',
            'customer_number',
            'address',
            'id_card',
            'image'
        ]);
        $this->editing = false;
        $this->customerId = null;
        $this->oldImage = null;
        return redirect()->route('customers');
    }
    public function render()
    {
        $customers = CustomerModel::with('admin')
            ->when($this->search, function ($query) {
                $query->where('first_name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('customer_number', 'like', "%{$this->search}%")
                    ->orWhere('id_card', 'like', "%{$this->search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        $this->CustomerCount = $customers->count();
        return view('livewire.mobile.customer', [
            'customers' => $customers,
            'CustomerCount' => $customers->total(),
        ]);
    }
}
