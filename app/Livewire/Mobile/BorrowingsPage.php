<?php

namespace App\Livewire\Mobile;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\UserForm;
use App\Support\Currency;
use App\Models\CashReceipt;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class BorrowingsPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $formType = 'loan';
public $currency = 'AFN';
    public $customer_id;
    public $amount;
    public $deleteLoan = false;   // کنترل مودال
    public $deleteLoanId = null; // نگهداری ID قرضه
    public $deleteCash = false;
    public $deleteCashId = null;
public function confirmDeleteCash($id)
{
    $this->deleteCashId = $id;
    $this->deleteCash = true;
}
public function deleteCashConfirmed()
{
    CashReceipt::findOrFail($this->deleteCashId)->delete();

    $this->deleteCash = false;
    $this->deleteCashId = null;

    session()->flash('success', 'رسید موفقانه حذف شد');
}

    public $date;
    public $note;
      protected function getLoansPageName()
    {
        return 'loansPage';
    }
public function confirmDeleteLoan($id)
{
    $this->deleteLoanId = $id;
    $this->deleteLoan = true;
}

public function deleteConfirmed()
{
    Loan::findOrFail($this->deleteLoanId)->delete();

    $this->deleteLoan = false;
    $this->deleteLoanId = null;

    session()->flash('success', 'قرضه موفقانه حذف شد');
}

    protected function getCashPageName()
    {
        return 'cashPage';
    }

    public $customers = [];
// Livewire Component
public $user;



   public function mount()
{
    $this->customers = Customer::all();
    $this->date = now()->format('Y-m-d');
    $this->user = Auth::user(); // اینو اضافه کن
}
 private function convertToEnglishNumber($value)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian, $english, $value);
    }
    public function setForm($type)
    {
        $this->formType = $type;
        $this->reset(['amount','note']);
        $this->date = now()->format('Y-m-d');
    }

    public function submit()
    {
        $this->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required',
            'date'        => 'required|date',
             'currency' => 'required|in:AFN,USD',
        ]);
    // ✅ تبدیل به افغانی
    $amountAfn = Currency::toAfn($this->amount, $this->currency);

    if ($this->formType === 'loan') {
        Loan::create([
            'customer_id' => $this->customer_id,
            'admin_id'    => Auth::id(),
            'amount' => $amountAfn, // فقط افغانی
             'note'        => $this->note,
            'loan_date'   => $this->date,
        ]);
    } else {
        CashReceipt::create([
            'customer_id' => $this->customer_id,
            'user_id'       => Auth::id(),
            'admin_id'      => Auth::id(),
            'amount' => $amountAfn, // فقط افغانی
            'note' => $this->note,
             'receipt_date' => $this->date,
        ]);
    }

        session()->flash('success', 'موفقانه ثبت شد');
        $this->reset(['amount','note']);
    }

    public function deleteLoan($id)
    {
        Loan::findOrFail($id)->delete();
         session()->flash('success', 'قرضه موفقانه حذف شد');
    }

    public function deleteCash($id)
    {
        CashReceipt::findOrFail($id)->delete();
    }

    public function render()
{
    return view('livewire.mobile.borrowings-page', [

        'loans' => Loan::with(['customer', 'user', 'admin'])  // <- اینجا اضافه شد
            ->oldest()
            ->paginate(7, ['*'], $this->getLoansPageName()),

        'cashReceipts' => CashReceipt::with(['customer', 'user', 'admin']) // <- اینجا هم اضافه شد
            ->oldest()
            ->paginate(7, ['*'], $this->getCashPageName()),

        'user' => $this->user
    ]);
}


}
