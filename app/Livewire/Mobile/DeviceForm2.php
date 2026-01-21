<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
class DeviceForm2 extends Component
{
    use WithFileUploads;
    public $image;
    public $buy_price;
    public $sell_price;
    public $profit;
    public $stock;
    public $imei;
    public $warranty;
    protected $rules = [
        'image'      => 'nullable|image|max:2048',
        'buy_price'  => 'required|numeric|min:0',
        'sell_price' => 'required|numeric|min:0',
        'stock'      => 'required|integer|min:0',
        'imei'       => 'required|string|min:10|unique:devices,imei',
        'warranty'   => 'nullable|string|max:100',
    ];
    protected $messages = [
        'buy_price.required'  => 'قیمت خرید الزامی است',
        'sell_price.required' => 'قیمت فروش الزامی است',
        'stock.required'      => 'موجودی الزامی است',
        'imei.required'       => 'شماره IMEI الزامی است',
        'imei.unique'         => 'این IMEI قبلاً ثبت شده است',
    ];
    public function updatedSellPrice()
    {
        $this->calculateProfit();
    }
    public function updatedBuyPrice()
    {
        $this->calculateProfit();
    }
    private function calculateProfit()
    {
        if (is_numeric($this->buy_price) && is_numeric($this->sell_price)) {
            $this->profit = $this->sell_price - $this->buy_price;
        }
    }
    public function save()
    {
        $this->buy_price  = $this->convertToEnglishNumber($this->buy_price);
        $this->sell_price = $this->convertToEnglishNumber($this->sell_price);
        $this->stock      = $this->convertToEnglishNumber($this->stock);
        $this->imei       = $this->convertToEnglishNumber($this->imei);

        $this->validate();

       $step1 = session('device-form');

if (!$step1) {
    session()->flash('error', 'لطفاً ابتدا فرم اول را تکمیل کنید.');
    return redirect()->route('device.step1');
}

$imagePath = $this->image ? $this->image->store('devices', 'public') : null;

// اگر فیلدهای فرم دوم خالی بودند، مقدار پیش‌فرض بده
$buy_price  = $this->buy_price ?? 0;
$sell_price = $this->sell_price ?? 0;
$stock      = $this->stock ?? 0;
$imei       = $this->imei ?? null;
$warranty   = $this->warranty ?? null;
$profit     = $this->profit ?? ($sell_price - $buy_price);

Device::create(array_merge($step1, [
    'image'      => $imagePath,
    'buy_price'  => $buy_price,
    'sell_price' => $sell_price,
    'profit'     => $profit,
    'stock'      => $stock,
    'imei'       => $imei,
    'warranty'   => $warranty,
]));

session()->forget('device-form');


        session()->forget('device-form');

        session()->flash('success', 'اطلاعات دستگاه با موفقیت ثبت شد');
        return redirect()->to('/device-information');
    }

 private function convertToEnglishNumber($value)
{
    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $english = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace($persian, $english, $value);
}
    public function render()
    {
        return view('livewire.mobile.device-form2')
            ->layout('Mobile.layouts.app');
    }
}
