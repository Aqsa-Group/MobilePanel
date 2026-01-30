<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\Withdrawal;
use App\Models\SalaryPayment;
use App\Models\CashFund as CashFundModel;
class Cashfund extends Component
{
    public function render()
    {
        $fund = CashFundModel::first() ?? new CashFundModel();
        $afnBalance = $fund->afn_balance ?? 0;
        $usdBalance = $fund->usd_balance ?? 0;
        $salesAFN = Withdrawal::where('currency', 'AFN')->sum('amount');
        $salesUSD = Withdrawal::where('currency', 'USD')->sum('amount');
        $salaryAFN = SalaryPayment::where('currency', 'AFN')->sum('amount');
        $salaryUSD = SalaryPayment::where('currency', 'USD')->sum('amount');
        $withdrawTotalAFN = $salesAFN + $salaryAFN;
        $withdrawTotalUSD = $salesUSD + $salaryUSD;
        $profitAFN = $salesAFN - $salaryAFN;
        $profitUSD = $salesUSD - $salaryUSD;
        $lossAFN = $salaryAFN;
        $lossUSD = $salaryUSD;
        $totalLoansAFN = 0;
        $totalLoansUSD = 0;
        return view('livewire.mobile.cashfund', compact(
            'afnBalance',
            'usdBalance',
            'salesAFN',
            'salesUSD',
            'withdrawTotalAFN',
            'withdrawTotalUSD',
            'profitAFN',
            'profitUSD',
            'lossAFN',
            'lossUSD',
            'totalLoansAFN',
            'totalLoansUSD'
        ));
    }
}
