<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Withdrawal;
use App\Models\SalaryPayment;
use App\Models\CashFund as CashFundModel;
class Cashfund extends Component
{
   public function render()
    {
        $fund = CashFundModel::first() ?? new CashFundModel();
        $afnBalance = $fund?->afn_balance ?? 0;
        $usdBalance = $fund?->usd_balance ?? 0;
        $totalWithdrawAFN = Withdrawal::where('currency', 'AFN')->sum('amount');
        $totalWithdrawUSD = Withdrawal::where('currency', 'USD')->sum('amount');
        $salaryPaidAFN = SalaryPayment::where('currency', 'AFN')->sum('amount');
        $salaryPaidUSD = SalaryPayment::where('currency', 'USD')->sum('amount');
        $profitAFN = $totalWithdrawAFN - $salaryPaidAFN;
        $profitUSD = $totalWithdrawUSD - $salaryPaidUSD;
        $lossAFN = $salaryPaidAFN;
        $lossUSD = $salaryPaidUSD;
        $totalSalesAFN = $totalWithdrawAFN;
        $totalSalesUSD = $totalWithdrawUSD;
        $totalLoansAFN = 0;
        $totalLoansUSD = 0;
        return view('livewire.mobile.cashfund', compact(
            'afnBalance','usdBalance',
            'profitAFN','profitUSD',
            'lossAFN','lossUSD',
            'totalSalesAFN','totalSalesUSD',
            'totalLoansAFN','totalLoansUSD'
        ));
    }
}
