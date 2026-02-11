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
public $imei;
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
    if (!empty($device->barcode)) {
        return $device->barcode;
    }
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
        'barcode' => $barcode,
        'name' => $device->name,
        'buy_price' => $device->buy_price,
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
        Device::findOrFail($this->deleteId)->delete();
        $this->confirmingDelete = false;
        $this->deleteId = null;
    }
}
public function saveDevice()
{
    if (empty($this->imei)) {
        $this->imei = 'BC-' . strtoupper(Str::random(8));
    }
    $this->buy_price  = $this->normalizeNumber($this->buy_price);
    $this->sell_price = $this->normalizeNumber($this->sell_price);
    $this->stock      = $this->normalizeNumber($this->stock);
    $this->imei       = $this->normalizeNumber($this->imei);
    $this->validate([
        'category' => 'required|string',
        'brand'    => 'required|string',
        'status'   => 'required|string',
        'model'    => 'required|string|max:255',
        'buy_price'  => 'required|numeric|min:0',
        'stock'      => 'required|integer|min:0',
        'imei'       => 'required|string|min:10|unique:devices,imei',
    ]);
    Device::create([
        'category'   => $this->category,
        'brand'      => $this->brand,
        'status'     => $this->status,
        'model'      => $this->model,
        'buy_price'  => $this->buy_price,
        'stock'      => $this->stock,
        'imei'       => $this->imei,
        'admin_id'   => auth()->id(),
    ]);
    session()->flash('success', 'دستگاه ثبت شد');
    $this->reset([
        'category','brand','status','model',
        'buy_price','stock','imei'
    ]);
}
private function normalizeNumber($value)
{
    if ($value === null) return null;
    $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $arabic  = ['٠','١','٢','٣','٤','٥','٦','٧','٨','٩'];
    $english = ['0','1','2','3','4','5','6','7','8','9'];
    $value = str_replace($persian, $english, $value);
    $value = str_replace($arabic,  $english, $value);
    return $value;
}
public function updatingBuyPrice($value)
{
    $this->buy_price = (float) $this->normalizeNumber($value);
}
public function updatingSellPrice($value)
{
    $this->sell_price = (float) $this->normalizeNumber($value);
}
    public function updatedBuyPrice($value)
    {
        $this->buy_price = (float) $value;
        $this->calculateProfit();
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
            'brand',
            'status',
        ]);
        $this->resetPage();
    }
    public function delete($id)
    {
        Device::findOrFail($id)->delete();
    }
  public function getDevicesProperty()
{
    return Device::with('admin')
        ->when($this->category, fn ($q) => $q->where('category', $this->category))
        ->when($this->brand, fn ($q) => $q->where('brand', $this->brand))
        ->when($this->status, fn ($q) => $q->where('status', $this->status))
        ->oldest()
        ->paginate(7);
}
    public function render()
    {
        return view('livewire.mobile.inventory', [
             'devices' => $this->devices,
        ]);
    }
}
