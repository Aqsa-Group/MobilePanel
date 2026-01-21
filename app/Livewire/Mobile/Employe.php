<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
class Employe extends Component
{
    use WithFileUploads, WithPagination;
    public $search = '';
    public $formKey;
    public $rule = null;
    public $deleteemployeeId = null;
    public $employeeId;
    public $image;
    public $filter = '';
    public $confirmingDelete = false;
    public $editMode = true;
    public $employee;
    public $name, $nid, $number, $address, $salary, $job, $imageName, $imagePreview;
    public $employeesCount = 0;
    public $deleteId = null;
    protected $paginationTheme = 'tailwind';
    public function deleteEmployee()
{
    Employee::findOrFail($this->deleteId)->delete();
    $this->confirmingDelete = false;
    $this->deleteId = null;

    session()->flash('success', 'کارمند با موفقیت حذف شد');
}
    public function confirmDelete($id)
    {
        $this->deleteemployeeId = $id;
        $this->confirmingDelete = true;
    }
    public function deleteConfirmed()
{
    $employee = Employee::findOrFail($this->deleteemployeeId);
    if ($employee->image && \Storage::disk('public')->exists($employee->image)) {
        \Storage::disk('public')->delete($employee->image);
    }
    $employee->delete();
    $this->confirmingDelete = false;
    $this->deleteemployeeId = null;
    session()->flash('success', 'کاربر با موفقیت حذف شد');
}
    public function updatingSearch()
    {
        $this->resetPage();
    }
public function mount()
    {
    $this->formKey = uniqid();
    $this->editMode = false;

    }
    private function convertToEnglishNumber($value)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persian, $english, $value);
    }
        public function save()
        {
            $this->validate([
            'image' => 'nullable|image|max:5120',
        ]);
        if ($this->image) {
        $imagePath = $this->image->store('employees', 'public');
    }
        $this->validate([ 'name' => 'required', 'image' => 'nullable|image|max:1024', 'nid' => ['required', 'regex:/^\d{4}-\d{4}-\d{5}$/'],    'number' => ['required', 'digits:10'], 'address' => 'required', 'salary' => 'required', 'job' => 'required' ],
        [ 'name.required' => 'لطفاً نام کارمند را وارد کنید', 'image.image' => 'فایل انتخابی باید تصویر باشد', 'image.max' => 'حداکثر حجم تصویر 1 مگابایت است', 'number.digits' => 'شماره تماس باید  ۱۰ رقم باشد و با 07شروع شود.','nid.regex' => 'شماره تذکره باید به فرم 41234-1245-1234 باشد.', 'nid.required' => 'شماره آیدی الزامی است', 'number.required' => 'شماره تماس را وارد کنید', 'address.required' => 'آدرس را وارد کنید', 'salary.required' => 'معاش را وارد کنید', 'job.required' => 'شغل کارمند الزامی است' ]);
        $imagePath = $this->image ? $this->image->store('employees', 'public') : null;
        $salary = (float) $this->convertToEnglishNumber($this->salary);
        Employee::create([
            'name' => $this->name,
            'image' => $imagePath,
            'nid' => $this->nid,
            'number' => $this->number,
            'address' => $this->address,
            'salary' => $salary,
            'job' => $this->job,
            'user_id'  => Auth::id(),                         // کی ثبت کرده
            'admin_id' => Auth::user()->admin_id ?? Auth::id(), // مربوط به کدام مدیر
        ]);
        $this->resetForm();
$this->resetPage();
session()->flash('success', 'کارمند با موفقیت ثبت شد');
        }
    public function resetForm()
{
    $this->reset([
        'name',
        'image',
        'nid',
        'number',
        'address',
        'salary',
        'job',
        'editMode',
        'employeeId',
    ]);
    $this->resetErrorBag();
    $this->resetValidation();
    $this->formKey = uniqid();
    $this->dispatch('reset-file-input');
}
    public function edit($id)
{
    $this->editMode = true;

    $this->employee = Employee::findOrFail($id); // ⭐⭐⭐ مهم

    $this->employeeId = $id;
    $this->name = $this->employee->name;
    $this->nid = $this->employee->nid;
    $this->number = $this->employee->number;
    $this->address = $this->employee->address;
    $this->salary = $this->employee->salary;
    $this->job = $this->employee->job;
    $this->image = null;
}
public function update()
{
    $this->salary = $this->convertToEnglishNumber($this->salary);
    $this->number = $this->convertToEnglishNumber($this->number);

    $this->validate([
        'name' => 'required|string|max:255',
        'nid' => ['required','regex:/^\d{4}-\d{4}-\d{5}$/','unique:employees,nid,' . $this->employeeId],
        'number' => ['required','digits:10','regex:/^07\d{8}$/'],
        'address' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'job' => 'required|string|max:100',
        'image' => 'nullable|image|max:2048',
    ]);

    $employee = Employee::findOrFail($this->employeeId);
    $imagePath = $employee->image;

    if ($this->image) {

        if ($employee->image && \Storage::disk('public')->exists($employee->image)) {
            \Storage::disk('public')->delete($employee->image);
        }

        $imagePath = $this->image->store('employees', 'public');
    }

    $employee->update([
        'name' => $this->name,
        'nid' => $this->nid,
        'number' => $this->number,
        'address' => $this->address,
        'salary' => $this->salary,
        'job' => $this->job,
        'image' => $imagePath,
    ]);

    session()->flash('success', 'اطلاعات با موفقیت بروزرسانی شد');
    return redirect()->route('employe');
}


    public function delete($id)
    {
        Employee::findOrFail($id)->delete();
        $this->resetPage();
        session()->flash('success', 'کارمند حذف شد');
    }
public function goToEdit($id)
{
    return redirect()->to('/employe-edit/' . $id);
}
public function updatingFilter()
{
    $this->resetPage();
}
public function getEmployeesCountProperty()
{
    return Employee::count();
}
public function render()
{
    $employees = Employee::query()
        ->when($this->search, fn($q) => $q->where('name', 'like', "%{$this->search}%"))
        ->when($this->filter, fn($q) => $q->where('job', $this->filter))
        ->orderBy('id', 'desc')
        ->paginate(5);
    $this->employeesCount = $employees->count();
    return view('livewire.mobile.employe', [
        'employees' => $employees,
        'employeesCount' => Employee::count(),
    ]);
}
}
