<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\UserForm;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Borrowing;
use App\Models\SalaryPayment;
use App\Models\Withdrawal;
use App\Models\Employee;
use App\Http\Livewire\Mobile\Inventory;
class Welcome extends Component
{
    public $totalUsers;
    public $expensesPercent = 0;
    public $activeUsers;
    public $totalCustomers;
    public $activeCustomers;
    public $todaySalesAmount;
    public $todaySalesPercent;
    public $monthlySales = [];
    public $todayProfitAmount;
    public $monthlyProfit = [];
    public $monthlyLoss = [];
    public $todayProfitPercent;
    public $totalBorrowings = 0;
    public $borrowingsPercent = 0;
    public $totalSalaryPaid = 0;
    public $totalemployee;
    public $activeemployee;
    public $totalWithdrawals = 0;
    public $totalShopStock = 0;
    public $totalWarehouseStock = 0;
    public $grandTotal = 0;
    public $warehousePercent = 0;
    public function mount()
    {
        $this->monthlyProfit = [];
        $this->monthlyLoss = [];
        $startMonth = Carbon::now()->startOfYear();
        for ($i = 0; $i < 12; $i++) {
            $monthStart = $startMonth->copy()->addMonths($i);
            $monthEnd = $monthStart->copy()->endOfMonth();
            $monthlySales = Sale::whereBetween('created_at', [$monthStart, $monthEnd])   ->sum('total_price');
            $monthlyCost = 0;
            $profit = $monthlySales;
            $loss = max(0, $monthlyCost - $monthlySales);
            $this->monthlyProfit[] = [
                'month' => $monthStart->format('M'),
                'amount' => $profit
            ];
            $this->monthlyLoss[] = [
                'month' => $monthStart->format('M'),
                'amount' => $loss
            ];
        $this->totalemployee = Employee::count();
        $this->activeemployee = Employee::where('updated_at', '>=', now()->subDays(30))->count();
        $this->totalBorrowings = Borrowing::sum('amount');
        $totalPaid = Borrowing::sum('paid_amount');
        $this->borrowingsPercent = $this->totalBorrowings > 0
            ? round(($totalPaid / $this->totalBorrowings) * 100, 1)
            : 0;
        $totalExpenses = $this->totalBorrowings + $this->totalSalaryPaid + $this->totalWithdrawals;
        $this->expensesPercent = $totalExpenses > 0
            ? round(($this->totalSalaryPaid + $this->totalWithdrawals) / $totalExpenses * 100, 1)
            : 0;
        $this->totalSalaryPaid = SalaryPayment::sum('amount');
        $this->totalWithdrawals = Withdrawal::sum('amount');
        $this->totalUsers = UserForm::count();
        $this->activeUsers = UserForm::whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('sessions')
                ->where('last_activity', '>=', now()->subMinutes(30)->timestamp);
        })->count();
        $this->totalCustomers = Customer::count();
        $this->activeCustomers = Customer::where('created_at', '>=', Carbon::now()->subDays(30))->count();
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $todaySales = Sale::whereDate('created_at', $today)->sum('total_price');
        $yesterdaySales = Sale::whereDate('created_at', $yesterday)->sum('total_price');
        $this->todaySalesAmount = $todaySales;
        $this->todaySalesPercent = $yesterdaySales > 0
            ? round((($todaySales - $yesterdaySales) / $yesterdaySales) * 100)
            : ($todaySales > 0 ? 100 : 0);
        $this->todayProfitAmount = $todaySales;
        $this->todayProfitPercent = $this->todaySalesPercent;
        if (DB::getSchemaBuilder()->hasColumn('products', 'buy_price') &&
            DB::getSchemaBuilder()->hasColumn('products', 'quantity')) {
            $this->totalShopStock = Product::sum(DB::raw('buy_price * quantity'));
        }
        if (DB::getSchemaBuilder()->hasColumn('products', 'buy_price') &&
    DB::getSchemaBuilder()->hasColumn('products', 'quantity') &&
    DB::getSchemaBuilder()->hasColumn('products', 'location')) {
    $this->totalShopStock = Product::where('location', 'shop')
        ->sum(DB::raw('buy_price * quantity'));
}
        if (DB::getSchemaBuilder()->hasColumn('devices', 'buy_price')) {
            $this->totalWarehouseStock = Device::sum('buy_price');
        }
        $this->grandTotal = $this->totalShopStock;
        $this->warehousePercent = $this->grandTotal > 0 ? 100 : 0;
        $this->monthlySales = [];
        $startMonth = Carbon::now()->startOfYear();
        for ($i = 0; $i < 12; $i++) {
            $monthStart = $startMonth->copy()->addMonths($i);
            $monthEnd = $monthStart->copy()->endOfMonth();
        $sales = Sale::whereBetween('created_at', [$monthStart, $monthEnd])->sum('total_price');
        $this->monthlySales[] = [
            'month' => $monthStart->format('M'),
            'sales' => $sales
        ];
    }
    }
    }
    public function render()
    {
        return view('livewire.mobile.welcome')
            ->layout('Mobile.layouts.app');
    }
}
