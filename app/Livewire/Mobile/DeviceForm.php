<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\Device;
use App\Models\Product;
use Illuminate\Support\Str;

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
        'imei'      => 'required|string|min:5|unique:devices,imei',
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
            $this->addError('imei', '❌ این بارکد در گدام وجود ندارد');
        }
    }

    private function convertToEnglishNumber($value)
{
    if ($value === null) return null;

    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    $english = ['0','1','2','3','4','5','6','7','8','9'];

    if (is_array($value)) {
        // اگر آرایه است، هر مقدار آرایه را تبدیل کن
        return array_map(function($v) use ($persian, $arabic, $english) {
            return str_replace($persian, $english, str_replace($arabic, $english, $v));
        }, $value);
    }

    return str_replace($persian, $english, str_replace($arabic, $english, $value));
}


    public function saveDevice()
    {
        $this->imei      = $this->convertToEnglishNumber($this->imei);
        $this->buy_price = $this->convertToEnglishNumber($this->buy_price);
        $this->stock     = $this->convertToEnglishNumber($this->stock);

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

        session()->flash('success', '✅ دستگاه با موفقیت به دوکان اضافه شد');

        return redirect()->route('inventory');
    }

    public function render()
    {
        return view('livewire.mobile.device-form');
    }
}
