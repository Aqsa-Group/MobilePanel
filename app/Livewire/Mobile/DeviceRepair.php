<?php
namespace App\Livewire\Mobile;
use App\Models\DeviceRepairForm;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class DeviceRepair extends Component
{
use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category, $name, $last_name, $brand_name, $device_model;
    public $imei_number, $device_color, $device_status, $device_mode;
    public $repair_type, $description, $possible_time, $phone_number;
    public $delivery_date, $visit_date, $repair_cost;
    public $counter = 1;
    public $editing = false;
    public $editingId = null;
    public $search = '';
    public string $successMessage = '';
    public $deleteId = null;
    public array $deviceStatuses = [
        'خوب' => 'ok',
        'شکسته' => 'broken',
    ];
    public array $repairTypes = [
        'نرم‌افزاری'         => 'software',
        'سخت‌افزاری'         =>  'hardware',
        'نصب ویندوز'        =>  'windows installatin',
        'برنامه ریزی'       =>  'planning'
    ];
    public array $deviceModes = [
        'جدید'        =>  'new',
        'استفاده شده' => 'used',
        'معیوب'       => 'broken'
    ];
    public array $possibleTime = [
        'یک روز'  => '1_day',
        'دو روز'  => '2_day',
        'یک هفته' => '1_week'
    ];
    public array $device_colors = [
        'آبی'     => 'blue',
        'سرخ'      => 'red',
        'زرد'   => 'yellow',
        'سفید'    => 'white',
        'سیاه'    => 'black',
        'سبز'    => 'green',
        'طلایی'   => 'golden',
        'خاکستری'     => 'gray',
        'رنگی' => 'colorful'
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
    protected function rules()
    {
        return [
            'category' => 'required|in:مبایل,دیسک تاپ,تبلیت,',
            'name' => 'required|string|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'phone_number' => 'required|regex:/^07[0-9]{8}$/',
            'last_name' => 'required|string|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'imei_number' => 'required|digits:15',
            'device_status' => 'required|in:' . implode(',', array_keys($this->deviceStatuses)),
            'repair_type' => 'required|in:' . implode(',', array_keys($this->repairTypes)),
            'device_mode' => 'required|in:' . implode(',', array_keys($this->deviceModes)),
            'possible_time' => 'required|in:' . implode(',', array_keys($this->possibleTime)),
            'repair_cost' => 'required|numeric|min:2',
            'delivery_date' => 'required|date|after_or_equal:today',
            'visit_date'    => 'required|date|after_or_equal:today',
            'description' =>  'required|string|max:50|min:5|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'device_color' => 'required|in:' . implode(',', array_keys($this->device_colors)),
            'brand_name' =>   'nullable|max:15|min:3|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'device_model' => 'required'
        ];
    }
    protected $messages = [
        'category.required' => 'انتخاب دسته‌بندی الزامی است',
        'name.required' => '*وارد کردن نام الزامی است',
        'name.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'last_name.required' => 'نام خانوادگی الزامی است',
        'last_name.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
        'imei_number.digits' => 'IMEI باید ۱۵ رقم باشد',
        'imei_number.required' => 'شماره IMEI الزامی میباشد',
        'repair_type.required' => 'نوع تعمیر الزامی است',
        'repair_cost.required' => 'هزینه تعمیر الزامی میباشد',
        'repair_cost.numeric' => 'باید مقدار عددی وارد کنید',
        'phone_number.required' => '* شماره تماس الزامی است',
        'phone_number.regex' => 'شماره تماس باید با 07 شروع شود و 10 رقم باشد',
        'delivery_date.required' => 'تاریخ تحویل الزامی است',
        'device_color.required' => 'انتخاب رنگ دستگاه الزامیست',
        'visit_date.required' => 'تاریخ مراجعه الزامیست',
        'device_status.required' => 'انتخاب شرایط دستگاه الزامست',
        'device_mode.required' => 'انتخاب حالت دستگاه الزامیست',
        'possible_time.required' => 'زمان احتمالی الزامیست',
        'device_model.required' => 'وارد کردن مدل دستگاه الزامیست',
        'description.required' => 'وارد کردن توضبحات الزامیست',
        'description.regex' => ' * فقط حروف مجاز است (بدون عدد یا علامت)',
    ];
    public function resetForm()
    {
        $this->reset([
            'category','name','last_name','brand_name','phone_number',
            'device_model','imei_number','device_color','device_status',
            'device_mode','repair_type','description','possible_time',
            'delivery_date','visit_date','repair_cost',
        ]);
        $this->resetErrorBag();
        $this->editing = false;
        $this->editingId = null;
    }
    public function save()
    {
        $this->validate();
        $this->repair_cost = $this->convertToEnglishNumber($this->repair_cost);
        $this->visit_date  = Carbon::parse($this->visit_date)->format('Y-m-d');
        $this->delivery_date = Carbon::parse($this->delivery_date)->format('Y-m-d');
        DeviceRepairForm::updateOrCreate(
            ['id' => $this->editingId],
            array_merge(
                $this->only([
                    'category','name','last_name','brand_name','phone_number',
                    'device_model','imei_number','device_color','device_status',
                    'device_mode','repair_type','description','possible_time',
                    'delivery_date','visit_date','repair_cost',
                ]),
                [
                    'user_id'  => Auth::id(),
                    'admin_id' => Auth::id(),
                ]
            )
        );
        session()->flash('success', 'اطلاعات با موفقیت ذخیره شد');
        $this->resetForm();
    }
    public function edit($id)
    {
        $data = DeviceRepairForm::findOrFail($id);
        $this->fill($data->toArray());
        $this->editing = true;
        $this->editingId = $id;
    }
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }
    public function delete()
    {
        DeviceRepairForm::findOrFail($this->deleteId)->delete();
        $this->deleteId = null;
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function cancelEdit()
    {
        $this->resetForm();
    }
    public function render()
    {
        $DeviceRepair = DeviceRepairForm::query()
            ->when($this->search !== '', function ($q) {
                $q->where(function ($qq) {
                    $qq->where('name', 'like', "%{$this->search}%")
                       ->orWhere('last_name', 'like', "%{$this->search}%");
                });
            })
            ->oldest()
            ->paginate(4);
        return view('livewire.mobile.device-repair', compact('DeviceRepair'))
            ->layout('Mobile.layouts.app');
    }
}
