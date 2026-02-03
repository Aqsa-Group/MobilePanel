<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Employe extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'tailwind';
    public $search = '';
    public $filter = '';
    public $formKey;
    public $editMode = false;
    public $employeeId;
    public $name,$nid,$number,$address,$salary,$job,$image;
    public $imagePreview,$imageName;
    public $confirmingDelete = false;
    public $deleteemployeeId;
    public function mount()
    {
        $this->formKey = uniqid();
    }
    private function convertToEnglishNumber($value)
    {
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];
        return str_replace($persian,$english,$value);
    }
    public function save()
    {
        $this->salary = $this->convertToEnglishNumber($this->salary);
        $this->number = $this->convertToEnglishNumber($this->number);
        $this->validate([
            'name'=>'required',
            'nid'=>'required|regex:/^\d{4}-\d{4}-\d{5}$/|unique:employees',
            'number'=>'required|digits:10',
            'address'=>'required',
            'salary'=>'required|numeric',
            'job'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);
        $imagePath = $this->image ? $this->image->store('employees','public') : null;
        Employee::create([
            'name'=>$this->name,
            'nid'=>$this->nid,
            'number'=>$this->number,
            'address'=>$this->address,
            'salary'=>$this->salary,
            'job'=>$this->job,
            'image'=>$imagePath,
            'user_id'=>Auth::id(),
            'admin_id'=>Auth::id(),
        ]);
        session()->flash('success','کارمند ثبت شد');
        $this->resetForm();
    }
    public function edit($id)
    {
        $emp = Employee::findOrFail($id);
        $this->employeeId = $emp->id;
        $this->name = $emp->name;
        $this->nid = $emp->nid;
        $this->number = $emp->number;
        $this->address = $emp->address;
        $this->salary = $emp->salary;
        $this->job = $emp->job;
        $this->imagePreview = $emp->image ? asset('storage/'.$emp->image) : null;
        $this->imageName = $emp->image ? basename($emp->image) : null;
        $this->editMode = true;
        $this->formKey = uniqid();
    }
    public function update()
    {
        $this->salary = $this->convertToEnglishNumber($this->salary);
        $this->number = $this->convertToEnglishNumber($this->number);
        $this->validate([
            'name'=>'required',
            'nid'=>'required|regex:/^\d{4}-\d{4}-\d{5}$/|unique:employees,nid,'.$this->employeeId,
            'number'=>'required|digits:10',
            'address'=>'required',
            'salary'=>'required|numeric',
            'job'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);
        $emp = Employee::findOrFail($this->employeeId);
        if($this->image){
            if($emp->image && Storage::disk('public')->exists($emp->image)){
                Storage::disk('public')->delete($emp->image);
            }
            $emp->image = $this->image->store('employees','public');
        }
        $emp->update([
            'name'=>$this->name,
            'nid'=>$this->nid,
            'number'=>$this->number,
            'address'=>$this->address,
            'salary'=>$this->salary,
            'job'=>$this->job,
            'image'=>$emp->image,
        ]);
        session()->flash('success','اطلاعات بروزرسانی شد');
        $this->resetForm();
    }
    public function updatedImage()
    {
        $this->imagePreview = $this->image->temporaryUrl();
        $this->imageName = $this->image->getClientOriginalName();
    }
    public function confirmDelete($id)
    {
        $this->deleteemployeeId = $id;
        $this->confirmingDelete = true;
    }
    public function deleteConfirmed()
    {
        $emp = Employee::findOrFail($this->deleteemployeeId);
        if($emp->image && Storage::disk('public')->exists($emp->image)){
            Storage::disk('public')->delete($emp->image);
        }
        $emp->delete();
        $this->confirmingDelete=false;
        session()->flash('success','کارمند حذف شد');
    }
    public function resetForm()
    {
        $this->reset(['name','nid','number','address','salary','job','image','employeeId','imagePreview','imageName']);
        $this->editMode=false;
        $this->formKey=uniqid();
    }
    public function render()
    {
        $employees = Employee::where('name','like','%'.$this->search.'%')
            ->when($this->filter, fn($q)=>$q->where('job',$this->filter))
            ->paginate(5);
        return view('livewire.mobile.employe',compact('employees'));
    }
}
