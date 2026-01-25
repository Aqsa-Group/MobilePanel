<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer as CustomerModel;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Carbon\Carbon;
use Livewire\TemporaryUploadedFile;
class Customers extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'tailwind';
    public $search = '';
    public $customer_type = '';
    public $weekCustomers;
    public $customerCount;
    public $todayCustomers;
    public $monthCustomers;
    public function mount()
    {
        $this->customerCount = CustomerModel::count();
        $this->todayCustomers = 0;
        $this->monthCustomers = 0;
        $this->weekCustomers = CustomerModel::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
    }
    public function delete($id)
    {
        CustomerModel::findOrFail($id)->delete();
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function render()
    {
        $this->weekCustomers = CustomerModel::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $this->customerCount = CustomerModel::count();
        $this->todayCustomers = CustomerModel::whereDate(
            'created_at',
            Carbon::today()
        )->count();
        $this->monthCustomers = CustomerModel::whereYear(
            'created_at',
            Carbon::now()->year
        )->whereMonth(
            'created_at',
            Carbon::now()->month
        )->count();
        $customers = CustomerModel::query()
        ->with('admin')
        ->when($this->search, function ($q) {
            $q->where(function ($q) {
                $q->where('fullname', 'like', '%' . $this->search . '%')
                ->orWhere('customer_type', 'like', '%' . $this->search . '%');
            });
        })
        ->when($this->customer_type, function ($q) {
            $q->where('customer_type', $this->customer_type);
        })
        ->oldest()
        ->paginate(5);
    return view('livewire.mobile.customers', compact('customers'));
    }
}
