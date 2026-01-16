<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\CustomerRecord;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class CustomerEdit extends Component
{
    use WithFileUploads;
    public $fullname, $customer_type, $customer_number, $address, $id_card, $image;
    public $customer, $oldImage;
    protected $layout = 'components.layouts.app';
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
        'image.max' => ' * حجم تصویر نباید بیشتر از ۲ مگابایت باشد',
    ];
    public function mount($id)
    {
        $this->customer = CustomerRecord::findOrFail($id);
        $this->fullname = $this->customer->fullname;
        $this->address = $this->customer->address;
        $this->customer_number = $this->customer->customer_number;
        $this->customer_type = $this->customer->customer_type;
        $this->id_card = $this->customer->id_card;
        $this->oldImage = $this->customer->image;
    }
    public function update()
    {
        $this->validate([
            'fullname' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'address' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u',
            'customer_type' => 'required|in:مشتری جدید,مشتری همیشه گی',
            'customer_number' => 'required|regex:/^07[0-9]{8}$/',
            'id_card' => 'required|regex:/^\d{5}[-\s]?\d{5}$/',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath = $this->oldImage;
        if ($this->image) {
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }
            $imagePath = $this->image->store('customers', 'public');
        }
        $this->customer->update([
            'fullname' => $this->fullname,
            'address' => $this->address,
            'customer_number' => $this->customer_number,
            'customer_type' => $this->customer_type,
            'id_card' => $this->id_card,
            'image' => $imagePath,
        ]);
        session()->flash('success', 'اطلاعات مشتری با موفقیت ویرایش شد');
        return redirect()->route('customers');
    }
    public function render()
    {
       return view('livewire.mobile.customer-edit')
        ->layout('Mobile.layouts.app');
    }
}
