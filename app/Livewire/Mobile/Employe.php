<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Employee;
class Employe extends Component
{
    use WithFileUploads, WithPagination;
    public $search = '';
    public $name, $image, $nid, $number, $address, $salary, $job;
    public $editMode = false;
    public $rule = null;
    public $employeeId;
    protected $paginationTheme = 'tailwind';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    private function convertToEnglishNumber($value)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persian, $english, $value);
    }
    public function save()
    {$this->validate([ 'name' => 'required', 'image' => 'nullable|image|max:1024', 'nid' => 'required', 'number' => 'required', 'address' => 'required', 'salary' => 'required', 'job' => 'required' ],
        [ 'name.required' => 'لطفاً نام کارمند را وارد کنید', 'image.image' => 'فایل انتخابی باید تصویر باشد', 'image.max' => 'حداکثر حجم تصویر 1 مگابایت است', 'nid.required' => 'شماره آیدی الزامی است', 'number.required' => 'شماره تماس را وارد کنید', 'address.required' => 'آدرس را وارد کنید', 'salary.required' => 'معاش را وارد کنید', 'job.required' => 'شغل کارمند الزامی است' ]);
        $imagePath = $this->image ? $this->image->store('employees', 'public') : null;
        $salary = $this->convertToEnglishNumber($this->salary);
        Employee::create([
            'name' => $this->name,
            'image' => $imagePath,
            'nid' => $this->nid,
            'number' => $this->number,
            'address' => $this->address,
            'salary' => $salary,
            'job' => $this->job,
        ]);
        $this->resetForm();
        session()->flash('success', 'کارمند با موفقیت ثبت شد');
    }
    public function edit($id)
    {
        $this->editMode = true;
        $employee = Employee::findOrFail($id);
        $this->employeeId = $id;
        $this->name = $employee->name;
        $this->nid = $employee->nid;
        $this->number = $employee->number;
        $this->address = $employee->address;
        $this->salary = $employee->salary;
        $this->job = $employee->job;
        $this->image = null;
    }
    public function update()
    {
            $this->salary = $this->convertToEnglishNumber($this->salary);
$this->number = $this->convertToEnglishNumber($this->number);
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'nid' => 'required|unique:employees,nid,' . $this->employeeId,
            'number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'job' => 'required|string'
        ], [
    'image.required' => 'آپلود عکس الزامی است',
    'image.image' => 'فایل انتخابی باید تصویر باشد',
    'image.max' => 'حداکثر حجم تصویر 2 مگابایت است',
]);
        $employee = Employee::findOrFail($this->employeeId);
        $imagePath = $this->image ? $this->image->store('employees', 'public') : $employee->image;
        $employee->update([
            'name' => $this->name,
            'image' => $imagePath,
            'nid' => $this->nid,
            'number' => $this->number,
            'address' => $this->address,
            'salary' => $this->salary,
            'job' => $this->job,
        ]);
        $this->resetForm();
        session()->flash('success', 'کارمند با موفقیت بروزرسانی شد');
    }
    public function delete($id)
    {
        Employee::findOrFail($id)->delete();
        $this->resetPage();
        session()->flash('success', 'کارمند حذف شد');
    }
    public function resetForm()
    {
        $this->reset(['name', 'image', 'nid', 'number', 'address', 'salary', 'job', 'editMode', 'employeeId']);
    }
public function goToEdit($id)
{
    return redirect()->to('/employe-edit/' . $id);
}
public function updatingFilter()
{
    $this->resetPage();
}
    public function render()
    {
        $query = Employee::query();
        if($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('nid', 'like', '%'.$this->search.'%')
                ->orWhere('number', 'like', '%'.$this->search.'%');
        }
        if($this->rule) {
            $query->where('job', $this->rule);
        }
    $employees = Employee::query()
        ->paginate(5);
        $employees = Employee::where('name', 'like', '%'.$this->search.'%')  ->orderBy('id','desc')   ->paginate(5);
        return view('livewire.mobile.employe', ['employees' => $employees]);
    }
}
