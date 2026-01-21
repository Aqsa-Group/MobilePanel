<?php
namespace App\Livewire\Mobile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class EmployeEdit extends Component
{
    use WithFileUploads;

    public $id;
    public $formKey;
    public $employee;
    public $name, $nid, $number, $address, $salary, $job;
    public $image;
    public $editMode = true;
    public $imagePreview;   // پیش‌نمایش تصویر
    public $imageName;    // برای نمایش اسم فایل
public function mount($id)
{
    $this->id = $id;
    $this->employee = Employee::findOrFail($id);
    $this->formKey = uniqid(); // این مقدار یکتا برای wire:key
    $this->editMode = true;
    $this->employee = Employee::find($id);
    $this->name = $this->employee->name;
    $this->nid = $this->employee->nid;
    $this->number = $this->employee->number;
    $this->address = $this->employee->address;
    $this->salary = $this->employee->salary;
    $this->job = $this->employee->job;

    // مقدار اولیه پیش‌نمایش و اسم تصویر
    $this->imagePreview = $this->employee->image ? asset('storage/' . $this->employee->image) : null;
    $this->imageName = $this->employee->image ? basename($this->employee->image) : null;
}
public function updatedImage()
{
    $this->imageName = $this->image->getClientOriginalName();
    $this->imagePreview = $this->image->temporaryUrl();
}


    public function update()
{
    $this->salary = $this->convertToEnglishNumber($this->salary);
    $this->number = $this->convertToEnglishNumber($this->number);

    $imageRule = $this->image instanceof \Livewire\TemporaryUploadedFile ? 'image|max:2048' : 'nullable';

    $this->validate([
        'name' => 'required|string|max:255',
        'nid' => ['required','regex:/^\d{4}-\d{4}-\d{5}$/','unique:employees,nid,' . $this->id],
        'number' => ['required','digits:10','regex:/^07\d{8}$/'],
        'address' => 'required|string|max:255',
        'salary' => 'required|numeric',
        'job' => 'required|string|max:100',
        'image' => $imageRule,
    ]);

     if (!empty($this->image)) {
            if ($this->employee->image && Storage::disk('public')->exists($this->employee->image)) {
                Storage::disk('public')->delete($this->employee->image);
            }
            $this->imagePath = $this->image->store('employees', 'public');
        }
    // مقدار پیش‌فرض
    $imagePath = $this->employee->image;

    // اگر عکس جدید آپلود شده
    if ($this->image instanceof \Livewire\TemporaryUploadedFile) {

        // حذف عکس قبلی
        if ($this->employee->image && \Storage::disk('public')->exists($this->employee->image)) {
            \Storage::disk('public')->delete($this->employee->image);
        }

        $filename = uniqid('emp_') . '.jpg';
        $imagePath = 'employees/' . $filename;

        $img = Image::make($this->image->getRealPath())
            ->encode('jpg', 90);

        \Storage::disk('public')->put($imagePath, (string) $img);
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
    return redirect()->route('employe');
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
