<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $confirmingDelete = false;
    public $deleteId;
    public $buy_price;
    public $model;
    public $memory;
    public $color;
    public $stock;
    public $sell_price;
    public $profit = 0;
    public $profitPercent = 0;
    public $showSaleDetails = false;
    public $selectedDevice;
    public $selectedCategory = '';
    public $selectedBrand = '';
    public $selectedStatus = '';
    public $category = null;
    public $brand = null;
    public $status = null;
    public $formKey;
    public $editing = false;
    public $editingId = null;
    public $device_id;
    public $barcode;
    public $imei;
    public $adminName;
    protected function rules()
    {
        return [
            'category' => 'required|string',
            'brand'    => 'required|string',
            'status'   => 'required|string',
            'model'    => 'required|string|max:255',
            'buy_price' => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'barcode' => 'nullable|unique:products_stock,barcode,' . $this->editingId
        ];
    }
    protected $messages = [
        'category.required' => 'انتخاب دسته‌بندی الزامی است',
        'category.string'   => 'دسته‌بندی باید رشته باشد',
        'brand.required'    => '*وارد کردن نام دستگاه الزامی است',
        'brand.string'      => '*نام دستگاه باید فقط حروف باشد',
        'status.required'   => 'حالت دستگاه را مشخص کنید',
        'status.string'     => 'وضعیت دستگاه باید رشته باشد',
        'model.required'    => 'وارد کردن مدل دستگاه الزامی است',
        'model.string'      => 'مدل دستگاه باید رشته باشد',
        'model.max'         => 'مدل دستگاه نمی‌تواند بیش از 255 کاراکتر باشد',
        'buy_price.required' => 'قیمت خرید الزامی است',
        'buy_price.numeric' => 'قیمت خرید باید عدد باشد',
        'buy_price.min'     => 'قیمت خرید نمی‌تواند منفی باشد',
        'stock.required'    => 'تعداد موجودی الزامی است',
        'stock.integer'     => 'تعداد باید عدد صحیح باشد',
        'stock.min'         => 'تعداد موجودی نمی‌تواند منفی باشد',
        'barcode.unique'    => 'این بارکد قبلاً ثبت شده است',
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
        $this->sell_price = (float) $this->selectedDevice->sell_price;
        $this->calculateProfit();
    }
    private function getOrCreateBarcode(Device $device)
    {
        $product = Product::where('name', $device->name)->first();
        if ($product && $product->barcode) {
            $device->barcode = $product->barcode;
            $device->save();
            return $product->barcode;
        }
        $barcode = 'BC-' . strtoupper(Str::random(8));
        $device->barcode = $barcode;
        $device->save();
        Product::create([
            'name' => $device->name,
            'buy_price' => $device->buy_price,
            'barcode' => $device->barcode,
            'sell_price_retail' => $device->sell_price,
            'quantity' => 1,
            'user_id' => Auth::id(),
            'admin_id' => Auth::id(),
        ]);
        return $barcode;
    }
    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }
   public function deleteConfirmed()
{
    if ($this->deleteId) {
        Product::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }
}
    public function edit($id)
    {
        $this->editing = true;
        $this->editingId = $id;
        $product = Product::findOrFail($id);
        $this->device_id = $product->id;
        $this->category = $product->category;
        $this->brand = $product->brand;
        $this->status = $product->status;
        $this->model = $product->model;
        $this->buy_price = $product->buy_price;
        $this->stock = $product->stock;
        $this->barcode = $product->barcode;
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
            'barcode',
            'category',
            'brand',
            'status',
            'model',
            'buy_price',
            'stock',
            'imei',
            'adminName',
        ]);
        $this->resetErrorBag();
        $this->editing = false;
        $this->editingId = null;
        $this->formKey = uniqid();
    }
    public function save()
    {
        $this->imei = $this->imei ?: 'BC-' . strtoupper(Str::random(8));
        $this->brand = $this->brand ?: $this->model;
        $this->buy_price  = $this->normalizeNumber($this->buy_price);
        $this->sell_price = $this->normalizeNumber($this->sell_price);
        $this->stock      = $this->normalizeNumber($this->stock);
        $this->buy_price = (float) $this->normalizeNumber($this->buy_price);
        $this->stock     = (int) $this->normalizeNumber($this->stock);
        $adminName = auth()->user()->name;
        $this->validate([
            'category'  => 'required|string',
            'status'    => 'required|string',
            'model'     => 'required|string',
            'buy_price' => 'required|numeric',
            'stock'     => 'required|numeric',
        ]);
        $adminId = auth()->id();
        if (!$adminId) {
            session()->flash('error', 'کاربر وارد سیستم نشده است');
            return;
        }
        $data = [
            'category'  => $this->category,
            'brand'     => $this->brand,
            'status'    => $this->status,
            'model'     => $this->model,
            'buy_price' => $this->buy_price,
            'stock'     => $this->stock,
            'imei'      => $this->imei,
            'barcode'   => $this->barcode ?: 'BC-' . strtoupper(Str::random(8)),
            'admin_id'  => auth()->id(),
            'admin_name' => auth()->user()->name,
        ];
        try {
            if ($this->editing && $this->editingId) {
                Product::findOrFail($this->editingId)->update($data);
                session()->flash('success', 'دستگاه ویرایش شد');
            } else {
                Product::create($data);
                session()->flash('success', 'دستگاه ثبت شد');
            }
        } catch (\Exception $e) {
            dd('خطا در ثبت: ' . $e->getMessage());
        }
        $this->resetForm();
        $this->resetPage();
    }
    private function normalizeNumber($value)
{
    if ($value === null) return null;

    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹','٬','٫',' '];
    $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩','٬','٫',' '];
    $english = ['0','1','2','3','4','5','6','7','8','9','','.',''];

    $value = str_replace($persian, $english, $value);
    $value = str_replace($arabic,  $english, $value);

    // کامای انگلیسی و علامت پول و هر چیز اضافی
    $value = str_replace([',','؋'], '', $value);

    return $value;
}
   public function updatingBuyPrice($value)
{
    $this->buy_price = $this->normalizeNumber($value); // بدون float
}
    public function updatingSellPrice($value)
    {
        $this->sell_price = (float) $this->normalizeNumber($value);
    }
   public function updatedBuyPrice($value)
{
    $this->buy_price = $this->normalizeNumber($value); // بدون float
}
    public function updatedSellPrice($value)
    {
        $this->sell_price = (float) $value;
        $this->calculateProfit();
    }
    public function calculateProfit()
    {
        if ($this->buy_price !== null && $this->sell_price !== null) {
            $this->profit = $this->sell_price - $this->buy_price;
            $this->profitPercent = $this->buy_price > 0 ? round(($this->profit / $this->buy_price) * 100, 2) : 0;
        } else {
            $this->profit = 0;
            $this->profitPercent = 0;
        }
    }
    public function applyFilter()
    {
        $this->category = $this->selectedCategory ?: null;
        $this->brand    = $this->selectedBrand ?: null;
        $this->status   = $this->selectedStatus ?: null;
        $this->resetPage();
    }
    public function resetFilter()
    {
        $this->reset([
            'selectedCategory',
            'selectedBrand',
            'selectedStatus',
            'category',
            'status',
        ]);
        $this->resetPage();
    }
    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }
    public function getDevicesProperty()
{
    return Product::with('admin')
        ->latest()          // یا ->orderByDesc('id')
        ->paginate(5);
}
    public function render()
    {
       return view('livewire.mobile.inventory', [
        'devices' => $this->devices, // همین ok است چون computed است
    ]);
    }
}
