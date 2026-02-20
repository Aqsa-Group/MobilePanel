<?php

namespace App\Livewire\Mobile;

use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Inventory2 extends Component
{

    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $product_id;
    public $barcode, $name, $category, $status;
    public $buy_price, $sell_price_retail, $sell_price_wholesale;
    public $total_buy, $paid_amount, $quantity;
    public $profit_each, $profit_total;
    public $formKey;
    public $editing = false;
    public $editingId = null;
    public $validated;

    public $search = '';
    public $categoryFilter = '';

    protected function rules()
    {
        return [
            'category'            => 'required|string|max:255',
            'name'                => 'required|string|max:255',
            'status'              => 'required|string|max:255',
            'quantity'            => 'required|integer|min:1',
            'buy_price'           => 'required|numeric|min:0',
            'sell_price_retail'   => 'required|numeric|min:0',
            'sell_price_wholesale' => 'required|numeric|min:0',
            'total_buy'           => 'required|numeric|min:0',
            'paid_amount'         => 'required|numeric|min:0',
            'barcode'             => 'nullable|unique:devices,barcode,' . $this->editingId,
        ];
    }

    protected $messages = [
        'category.required'         => 'انتخاب دسته‌بندی الزامی است',
        'category.string'           => 'دسته‌بندی باید رشته باشد',
        'category.max'              => 'طول دسته‌بندی نباید بیش از 255 کاراکتر باشد',

        'name.required'             => 'وارد کردن نام محصول الزامی است',
        'name.string'               => 'نام محصول باید رشته باشد',
        'name.max'                  => 'نام محصول نباید بیش از 255 کاراکتر باشد',

        'status.required'           => 'وضعیت محصول را مشخص کنید',
        'status.string'             => 'وضعیت محصول باید رشته باشد',
        'status.max'                => 'طول وضعیت نباید بیش از 255 کاراکتر باشد',

        'quantity.required'         => 'وارد کردن تعداد الزامی است',
        'quantity.integer'          => 'تعداد باید عدد صحیح باشد',
        'quantity.min'              => 'تعداد باید حداقل 1 باشد',

        'buy_price.required'        => 'قیمت خرید الزامی است',
        'buy_price.numeric'         => 'قیمت خرید باید عدد باشد',
        'buy_price.min'             => 'قیمت خرید نمی‌تواند منفی باشد',

        'sell_price_retail.required' => 'قیمت فروش عمده الزامی است',
        'sell_price_retail.numeric' => 'قیمت فروش عمده باید عدد باشد',
        'sell_price_retail.min'     => 'قیمت فروش عمده نمی‌تواند منفی باشد',

        'sell_price_wholesale.required' => 'قیمت فروش خرد الزامی است',
        'sell_price_wholesale.numeric' => 'قیمت فروش خرد باید عدد باشد',
        'sell_price_wholesale.min'     => 'قیمت فروش خرد نمی‌تواند منفی باشد',

        'total_buy.required'        => 'مبلغ کل خرید الزامی است',
        'total_buy.numeric'         => 'مبلغ کل خرید باید عدد باشد',
        'total_buy.min'             => 'مبلغ کل خرید نمی‌تواند منفی باشد',

        'paid_amount.required'      => 'مبلغ پرداختی الزامی است',
        'paid_amount.numeric'       => 'مبلغ پرداختی باید عدد باشد',
        'paid_amount.min'           => 'مبلغ پرداختی نمی‌تواند منفی باشد',

        'barcode.unique'            => 'این بارکد قبلاً ثبت شده است',

    ];

    public function mount()
    {
        if (!auth()->check()) {
            abort(403, 'کاربر وارد نشده است');
        }
    }
    public function toggleSaleDetails()
    {
        $this->showSaleDetails = !$this->showSaleDetails;
    }
    public function selectDevice($id)
    {
        $this->selectedDevice = Device::find($id);
        $barcode = $this->getOrCreateBarcode($this->selectedDevice);
        $this->buy_price  = (float) $this->selectedDevice->buy_price;
        $this->sell_price_retail = (float) $this->selectedDevice->sell_price_retail;
        $this->calculateProfit();
    }
    private function getOrCreateBarcode(Device $device)
    {
        $device = Device::where('model', $device->model)->first();
        if ($device && $device->barcode) {
            $device->barcode = $device->barcode;
            $device->save();
            return $device->barcode;
        }
        $barcode = 'BC-' . strtoupper(Str::random(8));
        $device->barcode = $barcode;
        $device->save();
        Device::create([
            'model' => $device->model,
            'buy_price' => $device->buy_price,
            'barcode' => $device->barcode,
            'sell_price_retail' => $device->sell_price,
            'quantity' => 1,
            'user_id' => Auth::id(),
            'admin_id' => Auth::id(),
        ]);
        return $barcode;
    }
    private function normalizeNumber($value)
    {
        if ($value === null) return null;

        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic  = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $value = str_replace($persian, $english, $value);
        $value = str_replace($arabic, $english, $value);

        return $value;
    }
    public function edit($id)
    {
        $this->editing = true;
        $this->editingId = $id;
        $device = Device::findOrFail($id);
        $this->product_id = $device->id;
        $this->barcode = $device->barcode;
        $this->name = $device->name;
        $this->category = $device->category;
        $this->status = $device->status;
        $this->buy_price = $device->buy_price;
        $this->sell_price_retail   = $device->sell_price_retail ?? 0;
        $this->sell_price_wholesale = $device->sell_price_wholesale ?? 0;
        $this->total_buy = $device->total_buy;
        $this->paid_amount = $device->paid_amount;
        $this->quantity = $device->quantity;
        $this->profit_each  = (float)$this->sell_price_retail - (float)$this->buy_price;
        $this->profit_total = $this->profit_each * (int)$this->quantity;
        $this->formKey = uniqid();
    }

    public function cancelEdit()
    {
        $this->resetErrorBag();
        $this->editing = false;
        $this->editingId = null;
    }

    public function resetForm()
    {
        $this->reset([
            'product_id',
            'barcode',
            'name',
            'category',
            'status',
            'buy_price',
            'sell_price_retail',
            'sell_price_wholesale',
            'total_buy',
            'paid_amount',
            'quantity',
        ]);
        $this->resetErrorBag();
        $this->editing = false;
        $this->editingId = null;
        $this->formKey = uniqid();
    }




    public function save()
    {
        $adminId = auth()->id();
        if (!$adminId) {
            session()->flash('error', 'کاربر وارد سیستم نشده است');
            return;
        }

        // تبدیل اعداد فارسی به انگلیسی
        $this->buy_price = $this->normalizeNumber($this->buy_price) ?: 0;
        $this->sell_price_retail = $this->normalizeNumber($this->sell_price_retail) ?: 0;
        $this->sell_price_wholesale = $this->normalizeNumber($this->sell_price_wholesale) ?: 0;
        $this->quantity = $this->normalizeNumber($this->quantity) ?: 0;
        $this->total_buy = $this->normalizeNumber($this->total_buy) ?: ($this->buy_price * $this->quantity);
        $this->paid_amount = $this->normalizeNumber($this->paid_amount) ?: 0;

        // محاسبه خودکار سود و باقی مانده
        $this->profit_each  = $this->sell_price_retail - $this->buy_price;
        $this->profit_total = $this->profit_each * $this->quantity;


        // اعتبارسنجی
        $validated = $this->validate();

        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'status' => $this->status,
            'buy_price' => $this->buy_price,
            'sell_price_retail' => $this->sell_price_retail,
            'sell_price_wholesale' => $this->sell_price_wholesale,
            'total_buy' => $this->total_buy,
            'paid_amount' => $this->paid_amount,
            'quantity' => $this->quantity,
            'profit_each' => $this->profit_each,
            'profit_total' => $this->profit_total,
            'barcode' => $this->barcode ?: 'BC-' . strtoupper(Str::random(8)),
            'admin_id' => $adminId,
            'admin_name' => auth()->user()->name,
        ];

        if ($this->editing && $this->editingId) {
            Device::findOrFail($this->editingId)->update($data);
            session()->flash('success', 'دستگاه ویرایش شد');
        } else {
            Device::create($data);
            session()->flash('success', 'دستگاه ثبت شد');
        }

        $this->resetForm();
        $this->resetPage();
    }



    public function delete($id)
    {
        Device::findOrFail($id)->delete();
        $this->resetForm();
    }



    public function render()
    {
        $devices = Device::where(function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('barcode', 'like', '%' . $this->search . '%');
        })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category', 'like', '%' . $this->categoryFilter . '%');
            })
            ->latest()
            ->paginate(5);

        return view('livewire.mobile.inventory2', compact('devices'));
    }
}
