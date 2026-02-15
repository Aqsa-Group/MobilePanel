<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LoanSell;
use App\Models\CashSell;
use Carbon\Carbon;

class Sell extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    protected $queryString = ['search'];

    /* وقتی سرچ تغییر کند هر دو صفحه ریست شود */
    public function updatingSearch()
    {
        $this->resetPage('loanPage');
        $this->resetPage('cashPage');
    }

    public function render()
    {
        $today = Carbon::today();
        $week  = Carbon::now()->startOfWeek();
        $month = Carbon::now()->startOfMonth();

        /* ================= LOAN ================= */

        $loanSales = LoanSell::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('model', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(6, ['*'], 'loanPage');

        /* ================= CASH ================= */

        $cashSales = CashSell::with('customer')
            ->when($this->search, function ($query) {
                $query->where('model', 'like', "%{$this->search}%")
                      ->orWhereHas('customer', function ($q) {
                          $q->where('fullname', 'like', "%{$this->search}%");
                      });
            })
            ->latest()
            ->paginate(6, ['*'], 'cashPage');

        /* ================= آمار کلی ================= */

        $totalCount = LoanSell::count() + CashSell::count();

        $totalAmount =
            LoanSell::sum('sell_price') +
            CashSell::sum('profit_total');

        /* ================= امروز ================= */

        $todayCount =
            LoanSell::whereDate('created_at', $today)->count() +
            CashSell::whereDate('created_at', $today)->count();

        $todayAmount =
            LoanSell::whereDate('created_at', $today)->sum('sell_price') +
            CashSell::whereDate('created_at', $today)->sum('profit_total');
/* ================= هفته ================= */

$weekCount =
    LoanSell::where('created_at', '>=', $week)->count() +
    CashSell::where('created_at', '>=', $week)->count();

$weekAmount =
    LoanSell::where('created_at', '>=', $week)->sum('sell_price') +
    CashSell::where('created_at', '>=', $week)->sum('profit_total');

/* ================= ماه ================= */

$monthCount =
    LoanSell::where('created_at', '>=', $month)->count() +
    CashSell::where('created_at', '>=', $month)->count();

$monthAmount =
    LoanSell::where('created_at', '>=', $month)->sum('sell_price') +
    CashSell::where('created_at', '>=', $month)->sum('profit_total');

       return view('livewire.mobile.sell', [
    'loanSales'   => $loanSales,
    'cashSales'   => $cashSales,
    'totalCount'  => $totalCount,
    'totalAmount' => $totalAmount,
    'todayCount'  => $todayCount,
    'todayAmount' => $todayAmount,
    'weekCount'   => $weekCount,   // 👈 اضافه شد
    'weekAmount'  => $weekAmount,
    'monthCount'  => $monthCount,  // 👈 اضافه شد
    'monthAmount' => $monthAmount,
]);
    }
}
