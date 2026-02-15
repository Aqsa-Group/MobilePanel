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

class Welcome extends Component
{
    public $totalUsers;
    public $activeUsers;

    public $totalCustomers;
    public $activeCustomers;

    public $todaySalesAmount = 0;
    public $todaySalesPercent = 0;

    public $todayProfitAmount = 0;
    public $todayProfitPercent = 0;

    public $monthlyProfit = [];
    public $monthlyLoss = [];

    public $totalBorrowings = 0;
    public $borrowingsPercent = 0;

    public $totalSalaryPaid = 0;
    public $totalWithdrawals = 0;
    public $expensesPercent = 0;

    public $totalemployee = 0;
    public $activeemployee = 0;

    public $totalShopStock = 0;
    public $totalWarehouseStock = 0;
    public $grandTotal = 0;
    public $warehousePercent = 0;

    public function mount()
    {
        /* =========================
           کاربران
        ==========================*/
        $this->totalUsers = UserForm::count();

        $this->activeUsers = UserForm::whereIn('id', function ($query) {
            $query->select('user_id')
                ->from('sessions')
                ->where('last_activity', '>=', now()->subMinutes(30)->timestamp);
        })->count();

        /* =========================
           مشتریان
        ==========================*/
        $this->totalCustomers = Customer::count();

        $this->activeCustomers = Customer::where(
            'created_at',
            '>=',
            Carbon::now()->subDays(30)
        )->count();

        /* =========================
           کارمندان
        ==========================*/
        $this->totalemployee = Employee::count();

        $this->activeemployee = Employee::where(
            'updated_at',
            '>=',
            now()->subDays(30)
        )->count();

        /* =========================
           فروش امروز
        ==========================*/
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $todaySales = Sale::whereDate('created_at', $today)->sum('total_price');
        $yesterdaySales = Sale::whereDate('created_at', $yesterday)->sum('total_price');

        $this->todaySalesAmount = $todaySales;

        $this->todaySalesPercent = $yesterdaySales > 0
            ? round((($todaySales - $yesterdaySales) / $yesterdaySales) * 100, 1)
            : ($todaySales > 0 ? 100 : 0);

        /* =========================
           مصارف امروز
        ==========================*/
        $todaySalary = SalaryPayment::whereDate('created_at', $today)->sum('amount');
        $todayWithdraw = Withdrawal::whereDate('created_at', $today)->sum('amount');

        $todayExpenses = $todaySalary + $todayWithdraw;

        $this->todayProfitAmount = max(0, $todaySales - $todayExpenses);

        $this->todayProfitPercent = $todaySales > 0
            ? round((($this->todayProfitAmount) / $todaySales) * 100, 1)
            : 0;

        /* =========================
           قرضه ها
        ==========================*/
        $this->totalBorrowings = Borrowing::sum('amount');
        $totalPaid = Borrowing::sum('paid_amount');

        $this->borrowingsPercent = $this->totalBorrowings > 0
            ? round(($totalPaid / $this->totalBorrowings) * 100, 1)
            : 0;

        /* =========================
           مجموع حقوق و برداشت
        ==========================*/
        $this->totalSalaryPaid = SalaryPayment::sum('amount');
        $this->totalWithdrawals = Withdrawal::sum('amount');

        $totalExpensesAll = $this->totalSalaryPaid + $this->totalWithdrawals;

        $this->expensesPercent = ($this->totalBorrowings + $totalExpensesAll) > 0
            ? round(($totalExpensesAll / ($this->totalBorrowings + $totalExpensesAll)) * 100, 1)
            : 0;

        /* =========================
           موجودی انبار
        ==========================*/
        if (
            DB::getSchemaBuilder()->hasColumn('products', 'buy_price') &&
            DB::getSchemaBuilder()->hasColumn('products', 'quantity')
        ) {
            $this->totalShopStock = Product::sum(DB::raw('buy_price * quantity'));
        }

        if (DB::getSchemaBuilder()->hasColumn('devices', 'buy_price')) {
            $this->totalWarehouseStock = Device::sum('buy_price');
        }

        $this->grandTotal = $this->totalShopStock + $this->totalWarehouseStock;

        $this->warehousePercent = $this->grandTotal > 0 ? 100 : 0;

        /* =========================
           گراف مفاد و ضرر ماهوار
        ==========================*/
        $this->monthlyProfit = [];
        $this->monthlyLoss = [];

        $startMonth = Carbon::now()->startOfYear();

        for ($i = 0; $i < 12; $i++) {

            $monthStart = $startMonth->copy()->addMonths($i);
            $monthEnd   = $monthStart->copy()->endOfMonth();

            // فروش ماه
            $monthlySales = Sale::whereBetween('created_at', [$monthStart, $monthEnd])
                ->sum('total_price');

            // حقوق ماه
            $monthlySalary = SalaryPayment::whereBetween('created_at', [$monthStart, $monthEnd])
                ->sum('amount');

            // برداشت ماه
            $monthlyWithdraw = Withdrawal::whereBetween('created_at', [$monthStart, $monthEnd])
                ->sum('amount');

            $monthlyExpenses = $monthlySalary + $monthlyWithdraw;

            $profit = max(0, $monthlySales - $monthlyExpenses);
            $loss   = max(0, $monthlyExpenses - $monthlySales);

            $this->monthlyProfit[] = $profit;
            $this->monthlyLoss[]   = $loss;
        }
    }

    public function render()
    {
        return view('livewire.mobile.welcome')
            ->layout('Mobile.layouts.app');
    }
}
