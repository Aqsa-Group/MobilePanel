<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerRecord;
use Carbon\Carbon;
class Customers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $search = '';
    public $customer_type = '';
    public $weekCustomers;
    public $customerCount;
    public $todayCustomers;
    public $monthCustomers;
    public function mount()
    {
        $this->customerCount = CustomerRecord::count();
        $this->todayCustomers = 0;
        $this->monthCustomers = 0;
        $this->weekCustomers = CustomerRecord::whereBetween('created_at', [
    Carbon::now()->startOfWeek(),
    Carbon::now()->endOfWeek(),
])->count();
    }
    public function delete($id)
    {
        CustomerRecord::findOrFail($id)->delete();
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function render()
    {
        $this->weekCustomers = CustomerRecord::whereBetween('created_at', [
    Carbon::now()->startOfWeek(),
    Carbon::now()->endOfWeek(),
])->count();
        $this->customerCount = CustomerRecord::count();
        $this->todayCustomers = CustomerRecord::whereDate(
            'created_at',
            Carbon::today()
        )->count();
        $this->monthCustomers = CustomerRecord::whereYear(
            'created_at',
            Carbon::now()->year
        )->whereMonth(
            'created_at',
            Carbon::now()->month
        )->count();
        $customers = CustomerRecord::query()
            ->when($this->search, function ($q) {
                $q->where(function ($q) {
                    $q->where('fullname', 'like', '%' . $this->search . '%')
                      ->orWhere('customer_type', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->customer_type, function ($q) {
                $q->where('customer_type', $this->customer_type);
            })
            ->latest()
            ->paginate(5);
        return view('livewire.mobile.customers', compact('customers'));
    }
}
