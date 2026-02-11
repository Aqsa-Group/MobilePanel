<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\Device;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DeviceForm extends Component
{
    public $fromWarehouse = false;

    public $category;
    public $brand;
    public $status;
    public $model;
    public $buy_price;
    public $stock;
    public $imei;

    protected $rules = [
        'category'  => 'required|string',
        'brand'     => 'required|string',
        'status'    => 'required|string',
        'model'     => 'required|string|max:255',
        'buy_price' => 'required|numeric|min:0',
        'stock'     => 'required|integer|min:1',
        'imei'      => 'nullable|string|min:5|unique:devices,imei',
    ];

    protected $messages = [
        'imei.unique' => '❌ این بارکد قبلاً در دوکان ثبت شده',
    ];

    // 🔹 وقتی بارکد تایپ می‌شود
    public function updatedImei($value)
    {
        $this->imei = $this->convertToEnglishNumber($value);

        if (!$this->imei) return;

        $product = Product::where('barcode', $this->imei)->first();

        if ($product) {
            $this->fromWarehouse = true;

            $this->category  = $product->category;
            $this->brand     = $product->company;
            $this->status    = $product->status;
            $this->model     = $product->name;
            $this->buy_price = $product->buy_price;
            $this->stock     = 1; // همیشه ۱ عدد می‌آید به دوکان

            $this->resetErrorBag('imei');
        } else {
            $this->fromWarehouse = false;
            $this->addError('imei', '❌ این بارکد در گدام وجود ندارد، بارکد اتومات ساخته خواهد شد');
        }
    }

    private function convertToEnglishNumber($value)
    {
        if ($value === null) return null;

        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
        $english = ['0','1','2','3','4','5','6','7','8','9'];

        if (is_array($value)) {
            return array_map(function($v) use ($persian, $arabic, $english) {
                return str_replace($persian, $english, str_replace($arabic, $english, $v));
            }, $value);
        }

        return str_replace($persian, $english, str_replace($arabic, $english, $value));
    }

    public function saveDevice()
    {
        // تبدیل اعداد فارسی به انگلیسی
        $this->imei      = $this->imei ? $this->convertToEnglishNumber($this->imei) : null;
        $this->buy_price = $this->convertToEnglishNumber($this->buy_price);
        $this->stock     = $this->convertToEnglishNumber($this->stock);

        // 🔹 اگر بارکد وارد نشده، اتومات بساز
        if (!$this->imei) {
            $this->imei = 'IMEI-' . Str::random(8);
        }

        $this->validate();

        // ✅ اگر از گدام آمده
        if ($this->fromWarehouse) {
            $product = Product::where('barcode', $this->imei)->lockForUpdate()->first();

            if (!$product || $product->quantity < 1) {
                $this->addError('imei', '❌ موجودی گدام کافی نیست');
                return;
            }

            // کم‌کردن از گدام
            $product->decrement('quantity', 1);
        }

        // ✅ ثبت در دوکان
        Device::create([
            'category' => $this->category,
            'brand'    => $this->brand,
            'status'   => $this->status,
            'model'    => $this->model,
            'buy_price'=> $this->buy_price,
            'stock'    => $this->stock,
            'imei'     => $this->imei,
            'admin_id' => auth()->id(),
        ]);

        // بازگردانی پیام موفقیت
        session()->flash('success', '✅ دستگاه با موفقیت به دوکان اضافه شد');

        // ریست فرم بعد از ثبت
        $this->resetForm();

        return redirect()->route('inventory');
    }

    public function resetForm()
    {
        $this->reset([
            'category','brand','status','model','buy_price','stock','imei','fromWarehouse'
        ]);
    }

    public function render()
    {
        return view('livewire.mobile.device-form');
    }
}
