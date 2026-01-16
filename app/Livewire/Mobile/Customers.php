<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\CustomerRecord;
use Livewire\WithPagination;
class Customers extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $customerCount;
    public $customer_type = '';
    public function mount()
    {
        $this->customerCount = CustomerRecord::count();
    }
    public function delete($id)
    {
        CustomerRecord::findOrFail($id)->delete();
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function render()
    {
        $customers = CustomerRecord::latest()->get();
        $stats = CustomerRecord::select('customer_type')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('customer_type')
            ->pluck('total', 'customer_type');
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
        return view('livewire.mobile.customers', [
            'customers' => $customers,
            'customerCount' => $customers->count(),
            'stats' => $stats,
        ]);
    }
}
