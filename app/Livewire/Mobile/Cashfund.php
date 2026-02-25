<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\SalaryPayment;
use App\Models\Loan;
use App\Models\CashReceipt;
use App\Models\LoanSell;
use App\Models\CashSell;
use App\Models\DeviceRepairForm;
use App\Models\Device;
use App\Models\ProductStock;
use App\Models\CashFund as CashFundModel;
use Illuminate\Support\Facades\DB;
class Cashfund extends Component
{
   public function render()
{
    $fund = CashFundModel::first() ?? new CashFundModel();
    $afnBalance = $fund->afn_balance ?? 0;
    $usdBalance = $fund->usd_balance ?? 0;
    $afnToUsdRate = 70;
    $salesAFN = LoanSell::sum('sell_price') + CashSell::sum('sell_price_retail');
    $salesUSD = $salesAFN / $afnToUsdRate;
    $repairIncomeAFN = DeviceRepairForm::sum('repair_cost');
    $afnToUsdRate = 70;
    $repairIncomeUSD = $repairIncomeAFN / $afnToUsdRate;
    $receiptAFN = CashReceipt::where('currency', 'AFN')->sum('amount');
    $receiptUSD = CashReceipt::where('currency', 'USD')->sum('amount');
    $totalIncreaseAFN = $salesAFN + $repairIncomeAFN + $receiptAFN;
    $totalIncreaseUSD = $salesUSD + $repairIncomeUSD + $receiptUSD;
    $salaryAFN = SalaryPayment::where('currency', 'AFN')->sum('amount');
    $salaryUSD = SalaryPayment::where('currency', 'USD')->sum('amount');
    $withdrawTotalAFN = Withdrawal::where('currency', 'AFN')
    ->where('withdrawal_type', '!=', 'حقوق کارکنان')
    ->sum('amount');

$withdrawTotalUSD = Withdrawal::where('currency', 'USD')
    ->where('withdrawal_type', '!=', 'حقوق کارکنان')
    ->sum('amount');
    $totalDecreaseAFN = $salaryAFN + $withdrawTotalAFN;
    $totalDecreaseUSD = $salaryUSD + $withdrawTotalUSD;
    $totalLoansAFN = Loan::where('amount', '>', 0)->sum('amount');
    $totalLoansUSD = $totalLoansAFN / $afnToUsdRate;
    $totalIncomeAFN = $totalIncreaseAFN - $totalDecreaseAFN;
    $totalIncomeUSD = $totalIncreaseUSD - $totalDecreaseUSD;
    $profitAFN = ($salesAFN + $repairIncomeAFN + $receiptAFN) - ($salaryAFN + $withdrawTotalAFN);
    $profitUSD = ($salesUSD + $repairIncomeUSD + $receiptUSD) - ($salaryUSD + $withdrawTotalUSD);
    $profitAFN = $profitAFN > 0 ? $profitAFN : 0;
    $profitUSD = $profitUSD > 0 ? $profitUSD : 0;
    $afnToUsdRate = 70;
    $totalDecreaseAFN = $salaryAFN + $withdrawTotalAFN;
    $totalDecreaseUSD = $salaryUSD + $withdrawTotalUSD;
    $totalLoansAFN = Loan::where('amount', '>', 0)->sum('amount');
    $totalLoansUSD = $totalLoansAFN / $afnToUsdRate;
    $lossAFN = ($totalDecreaseAFN + $totalLoansAFN) - $afnBalance;
    $lossUSD = ($totalDecreaseUSD + $totalLoansUSD) - $usdBalance;
    $lossAFN = $lossAFN > 0 ? $lossAFN : 0;
    $lossUSD = $lossUSD > 0 ? $lossUSD : 0;
    $shopBalanceAFN = 0;
    if (
        DB::getSchemaBuilder()->hasColumn('products_stock', 'buy_price') &&
        DB::getSchemaBuilder()->hasColumn('products_stock', 'stock')
    ) {
        $shopBalanceAFN = ProductStock::sum(DB::raw('buy_price * stock'));
    } elseif (DB::getSchemaBuilder()->hasColumn('products_stock', 'buy_price')) {
        $shopBalanceAFN = ProductStock::sum('buy_price');
    }
    $shopBalanceUSD = $shopBalanceAFN / $afnToUsdRate;
    $warehouseBalanceAFN = 0;
    if (
        DB::getSchemaBuilder()->hasColumn('devices', 'buy_price') &&
        DB::getSchemaBuilder()->hasColumn('devices', 'quantity')
    ) {
        $warehouseBalanceAFN = Device::sum(DB::raw('buy_price * quantity'));
    } elseif (DB::getSchemaBuilder()->hasColumn('devices', 'buy_price')) {
        $warehouseBalanceAFN = Device::sum('buy_price');
    }
    $warehouseBalanceUSD = $warehouseBalanceAFN / $afnToUsdRate;
    return view('livewire.mobile.cashfund', compact(
        'afnBalance',
        'usdBalance',
        'shopBalanceAFN',
        'shopBalanceUSD',
        'warehouseBalanceAFN',
        'warehouseBalanceUSD',
        'totalIncomeAFN',
        'totalIncomeUSD',
        'salesAFN',
        'salesUSD',
        'repairIncomeAFN',
        'repairIncomeUSD',
        'receiptAFN',
        'receiptUSD',
        'salaryAFN',
        'salaryUSD',
        'withdrawTotalAFN',
        'withdrawTotalUSD',
        'totalLoansAFN',
        'totalLoansUSD',
        'profitAFN',
        'profitUSD',
        'lossAFN',
        'lossUSD',
        'totalLoansAFN',
        'totalLoansUSD'
    ));
}
}
