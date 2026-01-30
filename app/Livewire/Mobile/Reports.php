<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sale;
use App\Models\Borrowing;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\SalaryPayment;
class Reports extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $totalSaleCount;
    public $totalSaleAmount;
    public $todaySaleCount;
    public $todaySaleAmount;
    public $weekSaleCount;
    public $weekSaleAmount;
    public $monthSaleCount;
    public $monthSaleAmount;
    public $totalSalaryAmount;
    public $totalPaidSalary;
    public $remainingSalary;
    public $totalBorrowCount;
    public $totalBorrowAmount;
    public $todayBorrowCount;
    public $todayBorrowAmount;
    public $weekBorrowCount;
    public $weekBorrowAmount;
    public $monthBorrowCount;
    public $monthBorrowAmount;
    public $totalProductCount;
    public $totalProductQuantity;
    public $totalBuyAmount;
    public $totalSellAmount;
    public function mount()
    {
        $this->totalSaleCount = Sale::count();
        $this->totalSaleAmount = Sale::sum('total_price');
        $this->todaySaleCount = Sale::whereDate('created_at', Carbon::today())->count();
        $this->todaySaleAmount = Sale::whereDate('created_at', Carbon::today())->sum('total_price');
        $this->weekSaleCount = Sale::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();
        $this->weekSaleAmount = Sale::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('total_price');
        $this->monthSaleCount = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $this->monthSaleAmount = Sale::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');
        $this->totalBorrowCount = Borrowing::count();
        $this->totalBorrowAmount = Borrowing::sum('amount');
        $this->todayBorrowCount = Borrowing::whereDate('created_at', Carbon::today())->count();
        $this->todayBorrowAmount = Borrowing::whereDate('created_at', Carbon::today())->sum('amount');
        $this->weekBorrowCount = Borrowing::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();
        $this->weekBorrowAmount = Borrowing::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('amount');
        $this->monthBorrowCount = Borrowing::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $this->monthBorrowAmount = Borrowing::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('amount');
        $this->totalProductCount    = Product::count();
        $this->totalProductQuantity = Product::sum('quantity');
        $this->totalBuyAmount       = Product::sum('total_buy');
        $this->totalSellAmount      = Product::sum('sell_price_retail');
        $this->totalSalaryAmount = \App\Models\Employee::sum('salary');
        $this->totalPaidSalary   = \App\Models\SalaryPayment::sum('amount');
        $this->remainingSalary   = $this->totalSalaryAmount - $this->totalPaidSalary;
    }
    public function render()
{
    $sales = Sale::with('customer')
        ->latest()
        ->paginate(7, ['*'], 'salesPage');
    $borrowings = Borrowing::with('customer')
        ->latest()
        ->paginate(5, ['*'], 'borrowingsPage');
    $products = Product::oldest()
        ->paginate(5, ['*'], 'productsPage');
    $withdrawals = \App\Models\Withdrawal::latest()->paginate(7);
    $salaryPayments = \App\Models\SalaryPayment::with('employee')
        ->orderBy('payment_date', 'desc')
        ->paginate(5, ['*'], 'salaryPage');
    return view('livewire.mobile.reports', [
        'sales'          => $sales,
        'borrowings'     => $borrowings,
        'products'       => $products,
        'salaryPayments' => $salaryPayments,
        'withdrawals'    => $withdrawals,
    ]);
}
}
