<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Device;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $confirmingDelete = false;
    public $deleteId;
    public $buy_price;
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
        $this->buy_price  = (float) $this->selectedDevice->buy_price;
        $this->sell_price = (float) $this->selectedDevice->sell_price;
        $this->calculateProfit();
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
        ->paginate(4);
}
    public function render()
    {
        return view('livewire.mobile.inventory', [
             'devices' => $this->devices,
        ]);
    }
}
