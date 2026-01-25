<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SalaryPayment;
use App\Models\Employee;
use Carbon\Carbon;
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
    public function updatedSearch()
    {
        $this->resetPage();
    }
    protected $rules = [
        'employee_id' => 'required|exists:employees,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
        'description' => 'nullable|string',
    ];
    public function mount()
    {
        $this->payment_date = Carbon::today()->format('Y-m-d');
    }
    public function submit()
    {
        $this->validate();
        if ($this->edit_id) {
            $payment = SalaryPayment::findOrFail($this->edit_id);
            $payment->update([
                'employee_id' => $this->employee_id,
                'amount' => $this->amount,
                'payment_date' => $this->payment_date,
                'description' => $this->description,
            ]);
            session()->flash('message', 'پرداخت بروزرسانی شد');
        } else {
            SalaryPayment::create([
                'employee_id' => $this->employee_id,
                'amount' => $this->amount,
                'payment_date' => $this->payment_date,
                'description' => $this->description,
            ]);
            session()->flash('message', 'پرداخت ثبت شد');
        }
        $this->resetForm();
    }
public function resetForm()
{
    $this->employee_id = '';
    $this->amount = '';
    $this->payment_date = Carbon::today()->format('Y-m-d');
    $this->description = '';
    $this->edit_id = null;
}
public function edit($id)
{
    $payment = SalaryPayment::findOrFail($id);
    $this->edit_id = $id;
    $this->employee_id = $payment->employee_id;
    $this->amount = $payment->amount;
    $this->payment_date = Carbon::parse($payment->payment_date)->format('Y-m-d');
    $this->description = $payment->description;
}
    public function delete($id)
    {
        SalaryPayment::findOrFail($id)->delete();
        session()->flash('message', 'پرداخت حذف شد');
    }
    public function render()
    {
        $payments = SalaryPayment::with('employee')
        ->whereHas('employee', function($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orderBy('payment_date', 'desc')
        ->paginate(4);
    $employees = Employee::all();
        return view('livewire.mobile.salaryworkers', [
            'payments' => $payments,
            'employees' => $employees,
        ]);
    }
}
