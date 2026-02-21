<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\UserForm;
use App\Support\Currency;
use App\Models\CashFund;
use App\Models\CashReceipt;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Withdrawal;
class BorrowingsPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $formType = 'loan';
    public $currency = 'AFN';
    public $customer_id;
    public $amount;
    public $deleteLoan = false;
    public $formError = null;
    public $deleteLoanId = null;
    public $monthlyCashAfn = 0;
    public $monthlyCashUsd = 0;
    public $monthlyLoanAfn = 0;
    public $monthlyLoanUsd = 0;
    public $deleteCash = false;
    public $totalLoanAfn = 0;
    public $totalCashAfn = 0;
    public $totalCashUsd = 0;
    public $totalLoanUsd = 0;
    public $deleteCashId = null;
    public $customers = [];
    public $user;
    public $date;
    public $note;
    public $editing = false;
    public $formKey;
    public $editMode = false;
    public $borrowingId;
    public function calculateTotalLoan()
    {
        $totalAfn = Loan::where('amount', '>', 0)->sum('amount');
        $this->totalLoanAfn = $totalAfn;
        $usdRate = 70;
        $this->totalLoanUsd = $totalAfn / $usdRate;
    }
    public function calculateMonthlyCash()
    {
        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth   = now()->endOfMonth()->format('Y-m-d');
        $totalAfn = CashReceipt::where('receipt_date', '>=', $startOfMonth)
            ->where('receipt_date', '<=', $endOfMonth)
            ->where('amount', '>', 0)
            ->sum('amount');
        $this->monthlyCashAfn = $totalAfn;
        $usdRate = 70;
        $this->monthlyCashUsd = $totalAfn / $usdRate;
    }
    public function calculateMonthlyLoan()
    {
        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth   = now()->endOfMonth()->format('Y-m-d');
        $totalAfn = Loan::where('loan_date', '>=', $startOfMonth)
            ->where('loan_date', '<=', $endOfMonth)
            ->where('amount', '>', 0)
            ->sum('amount');
        $this->monthlyLoanAfn = $totalAfn;
        $usdRate = 70;
        $this->monthlyLoanUsd = $totalAfn / $usdRate;
    }
    public function calculateTotalCash()
    {
        $totalAfn = CashReceipt::where('amount', '>', 0)->sum('amount');
        $this->totalCashAfn = $totalAfn;
        $usdRate = 70;
        $this->totalCashUsd = $totalAfn / $usdRate;
    }
    protected function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'amount'      => 'required|numeric|min:10',
            'currency' => 'required|in:AFN,USD',
        ];
    }
    protected $messages = [
        'customer_id.required' => '*  انتخاب نام مشتری الزامی است',
        'customer_id.exists' => '* نام مشتری در لیست مشتریان نیست',
        'amount.required'  => '*وارد کردن مبلغ قرضه الزامیست',
        'amount.numeric'      => 'لطفاّ از اعداد استفاده کنید',
        'amount.min'   => '*حداقل مقدار قرضه 10 افغانیست',
    ];
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
    public function mount()
    {
        $this->formKey = uniqid();
        $this->customers = Customer::all();
        $this->date = now()->format('Y-m-d');
        $this->user = Auth::user();
        $this->calculateTotalLoan();
        $this->calculateMonthlyLoan();
        $this->calculateMonthlyCash();
        $this->calculateTotalCash();
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
        $this->resetForm();
        $this->date = now()->format('Y-m-d');
    }
    private function getTotalIncome(): array
    {
        $afnToUsdRate = 70;
        $salesAFN = \App\Models\LoanSell::sum('sell_price') + \App\Models\CashSell::sum('profit_total');
        $salesUSD = $salesAFN / $afnToUsdRate;
        $repairIncomeAFN = \App\Models\DeviceRepairForm::sum('repair_cost');
        $repairIncomeUSD = $repairIncomeAFN / $afnToUsdRate;
        $receiptAFN = \App\Models\CashReceipt::where('currency', 'AFN')->sum('amount');
        $receiptUSD = \App\Models\CashReceipt::where('currency', 'USD')->sum('amount');
        $totalIncreaseAFN = $salesAFN + $repairIncomeAFN + $receiptAFN;
        $totalIncreaseUSD = $salesUSD + $repairIncomeUSD + $receiptUSD;
        $salaryAFN = \App\Models\SalaryPayment::where('currency', 'AFN')->sum('amount');
        $salaryUSD = \App\Models\SalaryPayment::where('currency', 'USD')->sum('amount');
        $withdrawTotalAFN = \App\Models\Withdrawal::where('currency', 'AFN')
            ->where('withdrawal_type', '!=', 'حقوق کارکنان')
            ->sum('amount');
        $withdrawTotalUSD = \App\Models\Withdrawal::where('currency', 'USD')
            ->where('withdrawal_type', '!=', 'حقوق کارکنان')
            ->sum('amount');
        $totalDecreaseAFN = $salaryAFN + $withdrawTotalAFN;
        $totalDecreaseUSD = $salaryUSD + $withdrawTotalUSD;
        $totalIncomeAFN = $totalIncreaseAFN - $totalDecreaseAFN;
        $totalIncomeUSD = $totalIncreaseUSD - $totalDecreaseUSD;
        $totalIncomeAFN = $totalIncomeAFN > 0 ? $totalIncomeAFN : 0;
        $totalIncomeUSD = $totalIncomeUSD > 0 ? $totalIncomeUSD : 0;
        return [$totalIncomeAFN, $totalIncomeUSD];
    }
    public function submit()
    {
        $this->amount = $this->convertToEnglishNumber($this->amount);
        $this->validate();
        $amountAfn = Currency::toAfn($this->amount, $this->currency);
        if ($this->editMode) {
            if ($this->formType === 'loan') {
                [$totalIncomeAFN, $totalIncomeUSD] = $this->getTotalIncome();
                $amountUsd = $amountAfn / 70;
                if ($this->currency === 'AFN' && $amountAfn > $totalIncomeAFN) {
                    $this->formError = ' درآمد کل کافی نیست.';
                    return;
                }
                if ($this->currency === 'USD' && $amountUsd > $totalIncomeUSD) {
                    $this->formError = ' درآمد کل کافی نیست.';
                    return;
                }
                $cashFund = CashFund::first() ?? new CashFund();
                $afnBalance = $cashFund->afn_balance ?? 0;
                $usdBalance = $cashFund->usd_balance ?? 0;
                $loan = Loan::findOrFail($this->borrowingId);
                $oldAmountAfn = (float) $loan->amount;
                $newAmountAfn = (float) $amountAfn;
                $diffAfn = $newAmountAfn - $oldAmountAfn;
                if ($diffAfn > 0) {
                    if ($this->currency === 'AFN' && $diffAfn > $afnBalance) {
                        $this->formError = ' موجودی کافی در صندوق وجود ندارد.';
                        return;
                    }
                    if ($this->currency === 'USD' && $diffAfn > $usdBalance) {
                        $this->formError = ' موجودی کافی در صندوق وجود ندارد.';
                        return;
                    }
                }
                $loan->update([
                    'customer_id' => $this->customer_id,
                    'amount'      => $amountAfn,
                    'note'        => $this->note,
                    'loan_date'   => $this->date,
                ]);
                if ($diffAfn > 0) {
                    if ($this->currency === 'AFN') {
                        $cashFund->afn_balance -= $diffAfn;
                    } else {
                        $cashFund->usd_balance -= $diffAfn;
                    }
                    $cashFund->save();
                }
                $w = Withdrawal::where('withdrawal_type', 'قرض مشتری')
                    ->where('description', 'like', "%(LN#{$loan->id})%")
                    ->first();
                if ($w) {
                    $w->update([
                        'amount' => $amountAfn,
                        'currency' => $this->currency,
                        'withdrawal_date' => $this->date,
                        'description' => 'برداشت قرض (LN#' . $loan->id . '): ' . ($this->note ?? ''),
                        'admin_id' => Auth::id(),
                    ]);
                }
                $this->formType = 'loan';
            } else {
                $cash = CashReceipt::findOrFail($this->borrowingId);
                $cash->update([
                    'customer_id' => $this->customer_id,
                    'amount'      => $amountAfn,
                    'note'        => $this->note,
                    'receipt_date' => $this->date,
                ]);
                $this->formType = 'cash';
            }
            session()->flash('success', 'موفقانه بروزرسانی شد');
            session()->flash('type', 'edit');
            $this->calculateTotalLoan();
            $this->calculateTotalCash();
            $this->calculateMonthlyLoan();
        } else {
            if ($this->formType === 'loan') {
                [$totalIncomeAFN, $totalIncomeUSD] = $this->getTotalIncome();
                $amountUsd = $amountAfn / 70;
                if ($this->currency === 'AFN' && $amountAfn > $totalIncomeAFN) {
                    $this->formError = ' درآمد کل کافی نیست.';
                    return;
                }
                if ($this->currency === 'USD' && $amountUsd > $totalIncomeUSD) {
                    $this->formError = ' درآمد کل کافی نیست.';
                    return;
                }
                $loan = Loan::create([
                    'customer_id' => $this->customer_id,
                    'admin_id'    => Auth::id(),
                    'amount'      => $amountAfn,
                    'note'        => $this->note,
                    'loan_date'   => $this->date,
                ]);
                Withdrawal::create([
                    'withdrawal_type' => 'قرض مشتری',
                    'amount' => $amountAfn,
                    'currency' => $this->currency,
                    'withdrawal_date' => $this->date,
                    'description' => 'برداشت قرض (LN#' . $loan->id . '): ' . ($this->note ?? ''),
                    'user_id' => Auth::id(),
                    'admin_id' => Auth::id(),
                ]);
                $cashFund = CashFund::first() ?? new CashFund();
                $afnBalance = $cashFund->afn_balance ?? 0;
                $usdBalance = $cashFund->usd_balance ?? 0;
                if ($this->currency === 'AFN' && $amountAfn > $afnBalance) {
                    $this->formError = ' موجودی کافی در صندوق وجود ندارد.';
                    return;
                }
                if ($this->currency === 'USD' && $amountAfn > $usdBalance) {
                    $this->formError = ' موجودی کافی در صندوق وجود ندارد.';
                    return;
                }
                if ($this->currency === 'AFN') {
                    $cashFund->afn_balance -= $amountAfn;
                } else {
                    $cashFund->usd_balance -= $amountAfn;
                }
                $cashFund->save();
                $this->formType = 'loan';
            } else {
                $loan = Loan::where('customer_id', $this->customer_id)
                    ->where('amount', '>=', $amountAfn)
                    ->first();
                if (!$loan) {
                    $this->formError = ' قرض کافی برای این رسید وجود ندارد.';
                    return;
                }
                $loan->amount -= $amountAfn;
                $loan->save();
                CashReceipt::create([
                    'customer_id' => $this->customer_id,
                    'user_id'     => Auth::id(),
                    'admin_id'    => Auth::id(),
                    'amount'      => $amountAfn,
                    'note'        => $this->note,
                    'receipt_date' => $this->date,
                ]);
                if (false) {
                    $loan->amount -= $amountAfn;
                    $loan->save();
                }
                $cashFund = CashFund::first() ?? new CashFund();
                if ($this->currency === 'AFN') {
                    $cashFund->afn_balance += $amountAfn;
                } else {
                    $cashFund->usd_balance += $amountAfn;
                }
                $cashFund->save();
                Loan::create([
                    'customer_id' => $this->customer_id,
                    'admin_id'    => Auth::id(),
                    'amount'      => -$amountAfn,
                    'note'        => 'کاهش قرض با رسید: ' . $this->note,
                    'loan_date'   => $this->date,
                ]);
                $this->formType = 'cash';
            }
            $this->formError = null;
            session()->flash('success', 'موفقانه ثبت شد');
            session()->flash('type', 'create');
            $this->calculateTotalLoan();
            $this->calculateTotalCash();
            $this->calculateMonthlyLoan();
        }
        $this->resetForm();
    }
    public function editLoan($id)
    {
        $record = Loan::findOrFail($id);
        $this->date = $record->loan_date;
        $this->borrowingId = $record->id;
        $this->customer_id = $record->customer_id;
        $this->amount = $record->amount;
        $this->note = $record->note;
        $this->editMode = true;
        $this->formKey = uniqid();
    }
    public function editCash($id)
    {
        $record = CashReceipt::findOrFail($id);
        $this->date = $record->receipt_date;
        $this->borrowingId = $record->id;
        $this->customer_id = $record->customer_id;
        $this->amount = $record->amount;
        $this->note = $record->note;
        $this->editMode = true;
        $this->formKey = uniqid();
        $this->formType = 'cash';
    }
    public function deleteLoan($id)
    {
        Loan::findOrFail($id)->delete();
        session()->flash('success', 'قرضه موفقانه حذف شد');
        $this->calculateTotalLoan();
        $this->calculateMonthlyLoan();
        Withdrawal::where('withdrawal_type', 'قرض مشتری')
            ->where('description', 'like', "%(LN#{$id})%")
            ->delete();
    }
    public function deleteCash($id)
    {
        CashReceipt::findOrFail($id)->delete();
        $this->calculateTotalLoan();
        $this->calculateMonthlyLoan();
    }
    public function resetForm()
    {
        $this->reset([
            'customer_id',
            'amount',
            'note',
            'borrowingId'
        ]);
        $this->editMode = false;
        if ($this->formType === 'loan') {
            $this->formType = 'loan';
        } else {
            $this->formType = 'cash';
        }
        $this->date = now()->format('Y-m-d');
        $this->formKey = uniqid();
        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.mobile.borrowings-page', [
            'loans' => Loan::with(['customer', 'user', 'admin'])
                ->oldest()
                ->paginate(7, ['*'], $this->getLoansPageName()),
            'cashReceipts' => CashReceipt::with(['customer', 'user', 'admin'])
                ->oldest()
                ->paginate(7, ['*'], $this->getCashPageName()),
            'user' => $this->user
        ]);
    }
}
