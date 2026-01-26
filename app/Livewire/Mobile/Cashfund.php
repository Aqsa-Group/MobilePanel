<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\SalaryPayment;
class Cashfund extends Component
{
    public function render()
{
    return view('livewire.mobile.Cashfund', [
        'totalSalary' => Employee::sum('salary'),
        'totalPaid' => SalaryPayment::sum('amount'),
        'remainingSalary' => Employee::sum('salary') - SalaryPayment::sum('amount'),
    ]);
}
}
