<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SalaryPayment;
use App\Models\Employee;
use App\Models\Withdrawal;
use Carbon\Carbon;
use App\Models\CashFund;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Auth;


class Salaryworkers extends Component
{
    use WithPagination;
    public $employee_id;
    public $amount;
    public $payment_date;
    public $description;
    public $edit_id;
    public $search = '';
    public $formKey;
    public $payment_date_display;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    protected $rules = [
        'employee_id' => 'required|exists:employees,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
        'description' => 'nullable|string|max:255',
    ];
    protected $messages = [
        'employee_id.required' => 'لطفا یک کارمند انتخاب کنید',
        'employee_id.exists' => 'کارمند انتخاب شده معتبر نیست',
        'amount.required' => 'لطفا مبلغ پرداخت را وارد کنید',
        'amount.numeric' => 'مبلغ باید عدد باشد',
        'description.string' => 'توضیحات باید متن باشد',
        'description.max' => 'توضیحات نمی‌تواند بیش از ۲۵۵ کاراکتر باشد',
    ];
    public function mount()
    {
        $this->formKey = uniqid();
        $this->payment_date = now()->format('Y-m-d');
        $this->payment_date_display = Jalalian::fromCarbon(now())->format('Y/m/d');
    }
    public function getRemainingSalaryProperty()
    {
        if (!$this->employee_id) return 0;
        $employee = Employee::find($this->employee_id);
        return $employee->salary -
            SalaryPayment::where('employee_id', $employee->id)->sum('amount');
    }
    private function convertToEnglishNumbers($string)
    {
        $faNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $enNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($faNumbers, $enNumbers, $string);
    }
    public function paidThisMonth($employee_id)
    {
        return SalaryPayment::where('employee_id', $employee_id)
            ->whereMonth('payment_date', Carbon::now()->month)
            ->whereYear('payment_date', Carbon::now()->year)
            ->sum('amount');
    }
    public function remainingThisMonth($employee_id)
    {
        $employee = Employee::find($employee_id);
        if (!$employee) return 0;
        $paid = $this->paidThisMonth($employee_id);
        return max(0, $employee->salary - $paid);
    }
    public function paidAmount($employee_id)
    {
        return SalaryPayment::where('employee_id', $employee_id)->sum('amount');
    }
    public function remainingAmount($employee_id)
    {
        $employee = Employee::find($employee_id);
        if (!$employee) return 0;
        $paid = $this->paidAmount($employee_id);
        return max(0, $employee->salary - $paid);
    }
    public function submit()
    {
        $this->amount = $this->convertToEnglishNumbers($this->amount);
        $this->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable|string|max:255',
        ]);
        $employee = Employee::find($this->employee_id);
        if (!$employee) {
            session()->flash('error', 'کارمند انتخاب شده معتبر نیست');
            return;
        }
        $fund = CashFund::first();
        if (!$fund || $fund->afn_balance <= 0) {
            session()->flash('error', 'موجودی صندوق کافی نیست');
            return;
        }
        $totalPaid = SalaryPayment::where('employee_id', $employee->id)->sum('amount');
        $remaining = max(0, $employee->salary - $totalPaid);
        if ($remaining <= 0) {
            session()->flash('error', 'حقوق این کارمند کامل پرداخت شده و مانده‌ای وجود ندارد');
            return;
        }
        if ($this->amount > $remaining) {
            session()->flash('error', "مبلغ وارد شده بیشتر از مانده حقوق است. مانده: {$remaining}");
            return;
        }
        if ($this->amount > $fund->afn_balance) {
            session()->flash('error', 'موجودی صندوق کافی نیست');
            return;
        }
        $carbonDate = now();
        if ($this->edit_id) {
            $payment = SalaryPayment::findOrFail($this->edit_id);
            $payment->update([
                'employee_id' => $this->employee_id,
                'amount' => $this->amount,
                'payment_date' => $carbonDate,
                'description' => $this->description,
                'admin_id' => Auth::user()->admin_id ?? Auth::id(),
            ]);
            session()->flash('message', 'پرداخت بروزرسانی شد');
        } else {
            $fund->afn_balance -= $this->amount;
            $fund->save();
            SalaryPayment::create([
                'employee_id' => $this->employee_id,
                'amount' => $this->amount,
                'payment_date' => $carbonDate,
                'description' => $this->description,
                'admin_id' => Auth::user()->admin_id ?? Auth::id(),
                'currency' => 'AFN',
            ]);
            Withdrawal::create([
                'withdrawal_type' => 'حقوق کارکنان',
                'amount' => $this->amount,
                'currency' => 'AFN',
                'withdrawal_date' => $carbonDate->toDateString(),
                'description' => "برداشت حقوق {$employee->name}",
                'user_id' => Auth::id(),
                'admin_id' => Auth::user()->admin_id ?? Auth::id(),
            ]);
            session()->flash('message', 'پرداخت ثبت شد و در برداشت کل صندوق ذخیره شد');
        }
        $this->resetForm();
        $this->edit_id = false;
    }
    public function resetForm()
    {
        $this->reset([
            'description',
            'employee_id',
            'amount',
        ]);

        $this->edit_id = false;
        $this->formKey = uniqid();
        $this->resetValidation();
    }
    public function edit($id)
    {
        $payment = SalaryPayment::findOrFail($id);
        $this->edit_id = $id;
        $this->employee_id = $payment->employee_id;
        $this->amount = $payment->amount;
        $this->payment_date = Carbon::parse($payment->payment_date)->format('Y-m-d');
        $this->description = $payment->description;
        $this->formKey = uniqid();
        $this->dispatch('scrollToForm');
        $this->payment_date_display = Jalalian::fromCarbon(Carbon::parse($payment->payment_date))->format('Y/m/d');

    }
    public function delete($id)
    {
        SalaryPayment::findOrFail($id)->delete();
        session()->flash('message', 'پرداخت حذف شد');
    }
    public function render()
    {
        $payments = SalaryPayment::with(['employee', 'admin'])
            ->when($this->employee_id, function ($query) {
                $query->where('employee_id', $this->employee_id);
            })
            ->when($this->search, function ($query) {
                $query->whereHas('employee', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('payment_date', 'asc')
            ->paginate(3);
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $employee->paid_this_month = SalaryPayment::where('employee_id', $employee->id)
                ->whereMonth('payment_date', Carbon::now()->month)
                ->whereYear('payment_date', Carbon::now()->year)
                ->sum('amount');
            $employee->remaining_this_month = max(0, $employee->salary - $employee->paid_this_month);
            $employee->paid_total = SalaryPayment::where('employee_id', $employee->id)->sum('amount');
            $employee->remaining_total = max(0, $employee->salary - $employee->paid_total);
        }
        $totalSalary = Employee::sum('salary');
        $totalPaid   = SalaryPayment::sum('amount');
        $paymentPercentage = $totalSalary > 0
            ? round(($totalPaid / $totalSalary) * 100, 2)
            : 0;
        $monthlySalary = $totalSalary / 12;
        $last30DaysPayment = SalaryPayment::where('payment_date', '>=', Carbon::now()->subDays(30))->sum('amount');
        $remainingMonthlySalary = $monthlySalary - $last30DaysPayment;
        $monthlyPaymentPercentage = $monthlySalary > 0
            ? round(($last30DaysPayment / $monthlySalary) * 100, 2)
            : 0;
        return view('livewire.mobile.salaryworkers', [
            'payments' => $payments,
            'employees' => $employees,
            'totalSalary' => $totalSalary,
            'totalPaid' => $totalPaid,
            'remainingSalary' => $totalSalary - $totalPaid,
            'paymentPercentage' => $paymentPercentage,
            'monthlySalary' => $monthlySalary,
            'last30DaysPayment' => $last30DaysPayment,
            'remainingMonthlySalary' => $remainingMonthlySalary,
            'monthlyPaymentPercentage' => $monthlyPaymentPercentage,
        ]);
    }
}
