<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
class EmployeEdit extends Component
{
    public $id;
    use WithFileUploads;
    public $employee;
    public $name, $nid, $number, $address, $salary, $job, $image;
    public function mount($id)
    {
        $this->id = $id;
        $this->employee = Employee::findOrFail($id);
        $this->name = $this->employee->name;
        $this->nid = $this->employee->nid;
        $this->number = $this->employee->number;
        $this->address = $this->employee->address;
        $this->salary = $this->employee->salary;
        $this->job = $this->employee->job;
        $this->image = $this->employee->image;
    }
    public function update()
{
    $this->salary = $this->convertToEnglishNumber($this->salary);
$this->number = $this->convertToEnglishNumber($this->number);
$this->validate([
    'name' => 'required|string|max:255',
    'nid' => 'required|string|max:100|unique:employees,nid,' . $this->id,
    'number' => 'required|string|max:15',
    'address' => 'required|string|max:255',
    'salary' => 'required|numeric',
    'job' => 'required|string|max:100',
    'image' => 'nullable|image|max:1024',
], [
    'name.required' => 'لطفاً نام کارمند را وارد کنید',
    'nid.required' => 'شماره آیدی الزامی است',
    'nid.unique' => 'این شماره آیدی قبلاً ثبت شده است',
    'number.required' => 'شماره تماس را وارد کنید',
    'address.required' => 'آدرس را وارد کنید',
    'salary.required' => 'معاش را وارد کنید',
    'job.required' => 'شغل کارمند الزامی است',
    'image.image' => 'فایل انتخابی باید تصویر باشد',
    'image.max' => 'حداکثر حجم تصویر 1 مگابایت است',
]);
    if ($this->image && is_object($this->image)) {
    if ($this->employee->image && \Storage::disk('public')->exists($this->employee->image)) {
        \Storage::disk('public')->delete($this->employee->image);
    }
    $imagePath = $this->image->store('employees', 'public');
} else {
    $imagePath = $this->employee->image;
}
$this->employee->update([
    'name' => $this->name,
    'nid' => $this->nid,
    'number' => $this->number,
    'address' => $this->address,
    'salary' => $this->salary,
    'job' => $this->job,
    'image' => $imagePath,
]);
    session()->flash('message', 'اطلاعات با موفقیت بروزرسانی شد!');
    return redirect()->to('/employe');
}
private function convertToEnglishNumber($string)
{
    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $english = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace($persian, $english, $string);
}
    public function render()
    {
        return view('livewire.mobile.employe-edit');
    }
}
