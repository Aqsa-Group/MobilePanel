<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\SalaryPayment;
use Carbon\Carbon;
class DashboardFinance extends Component
{
    public $todayTotal;
    public $weekTotal;
    public $monthTotal;
    public $totalWithdraw;
    public function mount()
    {
        $this->todayTotal = SalaryPayment::whereDate('payment_date', Carbon::today())
            ->sum('amount');
        $this->weekTotal = SalaryPayment::whereBetween('payment_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('amount');
        $this->monthTotal = SalaryPayment::whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year)
            ->sum('amount');
        $this->totalWithdraw = SalaryPayment::sum('amount');
    }
    public function render()
    {
        return view('livewire.mobile.Cashfund', [
            'todayTotal'   => $this->todayTotal,
            'weekTotal'    => $this->weekTotal,
            'monthTotal'   => $this->monthTotal,
            'totalWithdraw'=> $this->totalWithdraw,
        ]);
    }
}
