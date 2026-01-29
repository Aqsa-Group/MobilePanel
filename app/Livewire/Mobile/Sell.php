<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Sale;
use Livewire\WithPagination;
use Carbon\Carbon;
class Sell extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $totalCount;
    public $totalAmount;
    public $todayCount;
    public $todayAmount;
    public $weekCount;
    public $weekAmount;
    public $monthCount;
    public $monthAmount;

    public function mount()
    {
        $this->totalCount = Sale::count();
        $this->totalAmount = Sale::sum('total_price');

        $this->todayCount = Sale::whereDate('created_at', Carbon::today())->count();
        $this->todayAmount = Sale::whereDate('created_at', Carbon::today())->sum('total_price');

        $this->weekCount = Sale::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();

        $this->weekAmount = Sale::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('total_price');

        $this->monthCount = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $this->monthAmount = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');
    }

    public function render()
    {
        $sales = Sale::with('customer')
            ->latest()
            ->paginate(10);

        return view('livewire.mobile.sell', [
            'sales' => $sales
        ]);
    }
}
