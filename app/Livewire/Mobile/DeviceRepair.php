<?php
namespace App\Livewire\Mobile;
use App\Models\DeviceRepairForm;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;
use App\Models\CashFund;
use App\Models\User;
class DeviceRepair extends Component
{
use WithPagination;
    public $editing = false;
    protected $paginationTheme = 'bootstrap';
    public $category, $name, $device_model;
    public $device_status;
    public $repair_type, $description, $possible_time, $phone_number;
    public $delivery_date, $visit_date, $repair_cost;
    public $counter = 1;
    public $editingId = null;
    private float $afnToUsdRate = 70;
    public $confirmingDelete = false;
    public $deleteId = null;
    public $search = '';
    public string $successMessage = '';
    public $deviceModes = [
        'mobile' => 'موبایل',
        'desktop' => 'دسکتاپ',
        'tablet' => 'تبلت'
    ];
    public array $repairTypes = [
        'نرم‌افزاری',
        'سخت‌افزاری',
        'نصب ویندوز',
        'برنامه ریزی',
    ];
    public array $possibleTime = [
        'یک روز'  => '1_day',
        'دو روز'  => '2_day',
        'یک هفته' => '1_week'
    ];
    private function convertToEnglishNumber($value)
    {
        if ($value === null) return null;
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        $value = str_replace($persian, $english, $value);
        $value = str_replace($arabic,  $english, $value);
        return $value;
    }
   public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }
public function edit($id)
{
    $device = DeviceRepairForm::findOrFail($id);
    $this->editing = true;
    $this->editingId = $id;
    $this->category = $device->category;
    $this->device_model = $device->device_model;
    $this->repair_type = $device->repair_type;
    $this->repair_cost = $device->repair_cost;
    $this->name = $device->name;
    $this->phone_number = $device->phone_number;
    $this->description = $device->description;
}
    public function cancelEdit()
    {
        $this->resetForm();
    }
    public function cancelDelete()
    {
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }
    protected function rules()
    {
        return [
            'category' => 'required|in:مبایل,تبلیت,لپتاپ',
            'name' => 'required|string|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'phone_number' => 'required|regex:/^07[0-9]{8}$/',
            'repair_type' => 'required|in:' . implode(',', $this->repairTypes),
            'repair_cost' => 'required|numeric',
            'description' =>  'required|string|max:50|min:5|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'device_model' => 'required'
        ];
    }
    protected $messages = [
        'category.required' => 'انتخاب دسته‌بندی الزامی است',
        'name.required' => '*وارد کردن نام الزامی است',
        'name.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'repair_type.required' => 'نوع تعمیر الزامی است',
        'repair_cost.required' => 'هزینه تعمیر الزامی میباشد',
        'repair_cost.numeric' => 'باید مقدار عددی وارد کنید',
        'phone_number.required' => '* شماره تماس الزامی است',
        'phone_number.regex' => 'شماره تماس باید با 07 شروع شود و 10 رقم باشد',
        'device_status.required' => 'انتخاب شرایط دستگاه الزامست',
        'device_model.required' => 'وارد کردن مدل دستگاه الزامیست',
        'description.required' => 'وارد کردن توضبحات الزامیست',
        'description.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
    ];
  public function resetForm()
{
    $this->reset([
        'category','name','phone_number',
        'device_model','device_status',
        'repair_type','description','visit_date','repair_cost',
    ]);
    $this->resetErrorBag();
    $this->editing = false;
    $this->editingId = null;
}public function save()
{
    $this->repair_cost  = $this->convertToEnglishNumber($this->repair_cost);
    $this->repair_cost  = (float) $this->repair_cost;
    $this->phone_number = $this->convertToEnglishNumber($this->phone_number);
    $this->validate();
    if ($this->editing && $this->editingId) {
        DeviceRepairForm::findOrFail($this->editingId)->update([
            'category' => $this->category,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'device_model' => $this->device_model,
            'repair_type' => $this->repair_type,
            'repair_cost' => $this->repair_cost,
            'description' => $this->description,
        ]);
        $this->successMessage = 'اطلاعات با موفقیت بروزرسانی شد';
    } else {
        DeviceRepairForm::create([
            'category' => $this->category,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'device_model' => $this->device_model,
            'repair_type' => $this->repair_type,
            'repair_cost' => $this->repair_cost,
            'description' => $this->description,
            'visit_date' => now()->toDateString(),
            'user_id' => Auth::id(),
            'admin_id' => Auth::id(),
        ]);
$fund = CashFund::first();
if (!$fund) {
    $fund = CashFund::create([
        'afn_balance' => 0,
        'usd_balance' => 0,
    ]);
}
$fund->increment('afn_balance', $this->repair_cost);
        $this->successMessage = 'اطلاعات با موفقیت ذخیره شد';
    }
$usdAmount = $this->repair_cost / $this->afnToUsdRate;
$fund->increment('usd_balance', $usdAmount);
    $this->resetForm();
    $this->resetPage();
}
 public function deleteConfirmed()
    {
        if ($this->deleteId) {
            DeviceRepairForm::find($this->deleteId)?->delete();
            $this->confirmingDelete = false;
            $this->deleteId = null;
            session()->flash('successMessage', 'Device repair entry deleted successfully!');
        }
    }
    public function delete()
    {
        DeviceRepairForm::findOrFail($this->deleteId)->delete();
        $this->deleteId = null;
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function mount()
{
    $today = now()->format('Y-m-d');
    $this->visit_date = $this->visit_date ?? now()->toDateString();
    $this->delivery_date = now()->toDateString();
      if (!$this->editing) {
        $this->visit_date = now();
    }
}
public function updatedPossibleTime($value)
{
    $days = match ($value) {
        'یک روز'   => 1,
        'دو روز'   => 2,
        'یک هفته'  => 7,
        default    => 0,
    };
    if ($days > 0) {
        $this->visit_date = now()->addDays($days)->format('Y-m-d');
    }
}
    public function render()
    {
        $DeviceRepair = DeviceRepairForm::query()
            ->when($this->search !== '', function ($q) {
                $q->where(function ($qq) {
                    $qq->where('name', 'like', "%{$this->search}%")
                     ->orWhere('device_model', 'like', "%{$this->search}%");
                });
            })
            ->oldest()
            ->paginate(4);
         return view('livewire.mobile.device-repair', [
            'DeviceRepair' => $DeviceRepair,
        ]);
    }
}
