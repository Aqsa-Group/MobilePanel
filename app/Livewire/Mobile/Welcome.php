<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\UserForm;
use App\Models\Customer;
use App\Models\LoanSell;
use App\Models\CashSell;
use App\Models\CashReceipt;
use App\Models\DeviceRepairForm;
use App\Models\Product;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Morilog\Jalali\Jalalian;
use App\Models\Loan;
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
    public $todayExpensesAmount = 0;
    public $expensesPercent = 0;

    public $totalemployee = 0;
    public $activeemployee = 0;

    public $totalShopStock = 0;
    public $totalWarehouseStock = 0;
    public $grandTotal = 0;
    public $warehousePercent = 0;

    private function aggregateByJalaliMonth($rows, string $dateKey, string $amountKey): array
    {
        $monthly = array_fill(1, 12, 0.0);

        foreach ($rows as $row) {
            $dateValue = $row->{$dateKey} ?? null;
            if (!$dateValue) {
                continue;
            }

            $jalaliMonth = Jalalian::fromDateTime(Carbon::parse($dateValue))->getMonth();
            $monthly[$jalaliMonth] += (float) ($row->{$amountKey} ?? 0);
        }

        return $monthly;
    }

    private function clampPercent(float $value): float
    {
        return round(max(0, min(100, $value)), 1);
    }

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

        $todayStart = $today->copy()->startOfDay();
        $todayEnd = $today->copy()->endOfDay();
        $yesterdayStart = $yesterday->copy()->startOfDay();
        $yesterdayEnd = $yesterday->copy()->endOfDay();

        $todaySales =
            LoanSell::whereBetween('created_at', [$todayStart, $todayEnd])->sum('sell_price') +
            CashSell::whereBetween('created_at', [$todayStart, $todayEnd])->sum('sell_price_retail');

        $yesterdaySales =
            LoanSell::whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])->sum('sell_price') +
            CashSell::whereBetween('created_at', [$yesterdayStart, $yesterdayEnd])->sum('sell_price_retail');

        $this->todaySalesAmount = $todaySales;

        /* =========================
           مصارف امروز
        ==========================*/
        $todaySalary = SalaryPayment::whereBetween('payment_date', [$todayStart->toDateString(), $todayEnd->toDateString()])
            ->where('currency', 'AFN')
            ->sum('amount');

        $todayWithdraw = Withdrawal::whereBetween('withdrawal_date', [$todayStart->toDateString(), $todayEnd->toDateString()])
            ->where('currency', 'AFN')
            ->where('withdrawal_type', '!=', 'حقوق کارکنان')
            ->sum('amount');

        $todayRepairIncome = DeviceRepairForm::whereBetween('visit_date', [$todayStart->toDateString(), $todayEnd->toDateString()])
            ->sum('repair_cost');
        $todayReceipt = CashReceipt::whereBetween('receipt_date', [$todayStart->toDateString(), $todayEnd->toDateString()])
            ->where('currency', 'AFN')
            ->sum('amount');

        $todayIncome = $todaySales + $todayRepairIncome + $todayReceipt;
        $todayExpenses = $todaySalary + $todayWithdraw;

        $this->todaySalesPercent = $todayIncome > 0
            ? $this->clampPercent(($todaySales / $todayIncome) * 100)
            : 0;

        $this->todayProfitAmount = max(0, $todayIncome - $todayExpenses);

        $this->todayProfitPercent = $todayIncome > 0
            ? $this->clampPercent((($this->todayProfitAmount) / $todayIncome) * 100)
            : 0;

        /* =========================
           قرضه ها
        ==========================*/
        // همخوان با صفحه قرضه‌ها: مجموع قرضه‌های باز از جدول loans
        $this->totalBorrowings = Loan::where('amount', '>', 0)->sum('amount');
        $totalPaid = CashReceipt::where('currency', 'AFN')->where('amount', '>', 0)->sum('amount');

        $this->borrowingsPercent = ($this->totalBorrowings + $totalPaid) > 0
            ? $this->clampPercent(($totalPaid / ($this->totalBorrowings + $totalPaid)) * 100)
            : 0;

        /* =========================
           مصارف امروز (همخوان با کارت)
        ==========================*/
        $this->totalSalaryPaid = $todaySalary;
        $this->totalWithdrawals = $todayWithdraw;

        $todayTotalExpense = $this->totalSalaryPaid + $this->totalWithdrawals;
        $this->todayExpensesAmount = $todayTotalExpense;
        $this->expensesPercent = ($todayIncome + $todayTotalExpense) > 0
            ? $this->clampPercent(($todayTotalExpense / ($todayIncome + $todayTotalExpense)) * 100)
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

        if (
            DB::getSchemaBuilder()->hasColumn('devices', 'buy_price') &&
            DB::getSchemaBuilder()->hasColumn('devices', 'quantity')
        ) {
            $this->totalWarehouseStock = Device::sum(DB::raw('buy_price * quantity'));
        } elseif (DB::getSchemaBuilder()->hasColumn('devices', 'buy_price')) {
            $this->totalWarehouseStock = Device::sum('buy_price');
        }

        $this->grandTotal = $this->totalShopStock + $this->totalWarehouseStock;

        $this->warehousePercent = $this->grandTotal > 0
            ? $this->clampPercent(($this->totalWarehouseStock / $this->grandTotal) * 100)
            : 0;

        /* =========================
           گراف مفاد و ضرر ماهوار
        ==========================*/
        $this->monthlyProfit = [];
        $this->monthlyLoss = [];

        $jalaliYear = Jalalian::now()->getYear();
        $yearStart = Jalalian::fromFormat('Y/n/j', $jalaliYear . '/1/1')->toCarbon()->startOfDay();
        $nextYearStart = Jalalian::fromFormat('Y/n/j', ($jalaliYear + 1) . '/1/1')->toCarbon()->startOfDay();
        $yearEnd = $nextYearStart->copy()->subSecond();

        $loanDaily = LoanSell::whereBetween('created_at', [$yearStart, $yearEnd])
            ->selectRaw('DATE(created_at) as d, SUM(sell_price) as amount')
            ->groupBy('d')
            ->get();
        $cashDaily = CashSell::whereBetween('created_at', [$yearStart, $yearEnd])
            ->selectRaw('DATE(created_at) as d, SUM(sell_price_retail) as amount')
            ->groupBy('d')
            ->get();
        $repairDaily = DeviceRepairForm::whereBetween('visit_date', [$yearStart->toDateString(), $yearEnd->toDateString()])
            ->selectRaw('visit_date as d, SUM(repair_cost) as amount')
            ->groupBy('d')
            ->get();
        $receiptDaily = CashReceipt::whereBetween('receipt_date', [$yearStart->toDateString(), $yearEnd->toDateString()])
            ->where('currency', 'AFN')
            ->selectRaw('receipt_date as d, SUM(amount) as amount')
            ->groupBy('d')
            ->get();
        $salaryDaily = SalaryPayment::whereBetween('payment_date', [$yearStart->toDateString(), $yearEnd->toDateString()])
            ->where('currency', 'AFN')
            ->selectRaw('payment_date as d, SUM(amount) as amount')
            ->groupBy('d')
            ->get();
        $withdrawDaily = Withdrawal::whereBetween('withdrawal_date', [$yearStart->toDateString(), $yearEnd->toDateString()])
            ->where('currency', 'AFN')
            ->where('withdrawal_type', '!=', 'حقوق کارکنان')
            ->selectRaw('withdrawal_date as d, SUM(amount) as amount')
            ->groupBy('d')
            ->get();

        $salesByMonth = array_fill(1, 12, 0.0);
        foreach ($this->aggregateByJalaliMonth($loanDaily, 'd', 'amount') as $m => $v) {
            $salesByMonth[$m] += $v;
        }
        foreach ($this->aggregateByJalaliMonth($cashDaily, 'd', 'amount') as $m => $v) {
            $salesByMonth[$m] += $v;
        }

        $incomeByMonth = $salesByMonth;
        foreach ($this->aggregateByJalaliMonth($repairDaily, 'd', 'amount') as $m => $v) {
            $incomeByMonth[$m] += $v;
        }
        foreach ($this->aggregateByJalaliMonth($receiptDaily, 'd', 'amount') as $m => $v) {
            $incomeByMonth[$m] += $v;
        }

        $expenseByMonth = array_fill(1, 12, 0.0);
        foreach ($this->aggregateByJalaliMonth($salaryDaily, 'd', 'amount') as $m => $v) {
            $expenseByMonth[$m] += $v;
        }
        foreach ($this->aggregateByJalaliMonth($withdrawDaily, 'd', 'amount') as $m => $v) {
            $expenseByMonth[$m] += $v;
        }

        for ($month = 1; $month <= 12; $month++) {
            $monthlyIncome = $incomeByMonth[$month];
            $monthlyExpenses = $expenseByMonth[$month];
            $this->monthlyProfit[] = max(0, $monthlyIncome - $monthlyExpenses);
            $this->monthlyLoss[] = max(0, $monthlyExpenses - $monthlyIncome);
        }
    }

    public function render()
    {
        return view('livewire.mobile.welcome')
            ->layout('Mobile.layouts.app');
    }
}
