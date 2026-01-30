<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Device;
class DeviceForm extends Component
{
    use WithFileUploads;
    public $category;
    public $brand;
    public $status;
    public $model;
    public $memory;
    public $color;
    public $image;
    public $device;
    public $buy_price;
    public $sell_price;
    public $profit;
    public $stock;
    public $imei;
    public $warranty;
    protected $rules = [
        'category' => 'required|string',
        'brand'    => 'required|string',
        'status'   => 'required|string',
        'model'    => 'required|string|max:255',
        'memory'   => 'required|string|max:50',
        'color'    => 'required|string|max:50',
        'image'    => 'nullable|image|max:2048',
        'buy_price'  => 'required|numeric|min:0',
        'sell_price' => 'required|numeric|min:0',
        'stock'      => 'required|integer|min:0',
        'imei'       => 'required|string|min:10|unique:devices,imei',
        'warranty'   => 'nullable|string|max:100',
    ];
    protected $messages = [
        'category.required' => 'انتخاب کتگوری الزامی است',
        'brand.required'    => 'انتخاب برند الزامی است',
        'status.required'   => 'انتخاب وضعیت الزامی است',
        'model.required'    => 'مدل دستگاه را وارد کنید',
        'memory.required'   => 'حافظه را وارد کنید',
        'color.required'    => 'رنگ را وارد کنید',
        'buy_price.required'  => 'قیمت خرید الزامی است',
        'sell_price.required' => 'قیمت فروش الزامی است',
        'stock.required'      => 'موجودی الزامی است',
        'imei.required'       => 'شماره IMEI الزامی است',
        'imei.unique'         => 'این IMEI قبلاً ثبت شده است',
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
    public function updatedBuyPrice($value)
    {
        $this->buy_price = $this->convertToEnglishNumber($value);
        $this->calculateProfit();
    }
    public function updatedSellPrice($value)
    {
        $this->sell_price = $this->convertToEnglishNumber($value);
        $this->calculateProfit();
    }
    public function updatedStock($value)
    {
        $this->stock = $this->convertToEnglishNumber($value);
    }
    public function updatedImei($value)
    {
        $this->imei = $this->convertToEnglishNumber($value);
    }
    private function calculateProfit()
    {
        if (is_numeric($this->buy_price) && is_numeric($this->sell_price)) {
            $this->profit = $this->sell_price - $this->buy_price;
        }
    }
    public function saveDevice()
    {
        $this->buy_price  = $this->convertToEnglishNumber($this->buy_price);
        $this->sell_price = $this->convertToEnglishNumber($this->sell_price);
        $this->stock      = $this->convertToEnglishNumber($this->stock);
        $this->imei       = $this->convertToEnglishNumber($this->imei);
        $this->validate();
        $imagePath = $this->image ? $this->image->store('devices', 'public') : null;
        Device::create([
            'category'   => $this->category,
            'brand'      => $this->brand,
            'status'     => $this->status,
            'model'      => $this->model,
            'memory'     => $this->memory,
            'color'      => $this->color,
            'image'      => $imagePath,
            'buy_price'  => $this->buy_price,
            'sell_price' => $this->sell_price,
            'profit'     => $this->profit,
            'stock'      => $this->stock,
            'imei'       => $this->imei,
            'warranty'   => $this->warranty,
             'admin_id'   => auth()->id(),
        ]);
        session()->flash('success', 'اطلاعات دستگاه با موفقیت ثبت شد');
        return redirect()->route('inventory');
    }
    public function render()
    {
        return view('livewire.mobile.device-form')
            ->layout('Mobile.layouts.app');
    }
}
