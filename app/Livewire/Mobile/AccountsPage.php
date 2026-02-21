<?php
namespace App\Livewire\Mobile;
use Morilog\Jalali\Jalalian;
use Livewire\Component;
use App\Models\Withdrawal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\CashFund as CashFundModel;
class AccountsPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $withdrawal_type;
    public $withdrawal_date;
    public string $currency = 'AFN';
    public $description;
    public $search = '';
    public string $filterType = '';
    public string $successMessage = '';
    public  $amount;
    public $current_date;
    public $counter = 1;
    public $todayTotal;
    public $weekTotal;
    public $monthTotal;
    public $editing = false;
    public $editingId = null;
    public $formKey;
    public $editMode = false;
    protected $listeners = ['setWithdrawalDate'];
    public function setWithdrawalDate($date)
    {
        $this->withdrawal_date = $date;
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
    $withdrawTotalAFN = \App\Models\Withdrawal::where('currency', 'AFN')->sum('amount');
    $withdrawTotalUSD = \App\Models\Withdrawal::where('currency', 'USD')->sum('amount');
    $totalDecreaseAFN = $salaryAFN + $withdrawTotalAFN;
    $totalDecreaseUSD = $salaryUSD + $withdrawTotalUSD;
    $totalIncomeAFN = $totalIncreaseAFN - $totalDecreaseAFN;
    $totalIncomeUSD = $totalIncreaseUSD - $totalDecreaseUSD;
    $totalIncomeAFN = $totalIncomeAFN > 0 ? $totalIncomeAFN : 0;
    $totalIncomeUSD = $totalIncomeUSD > 0 ? $totalIncomeUSD : 0;
    return [$totalIncomeAFN, $totalIncomeUSD];
}
    public function mount()
    {
        $this->current_date = now();
        $this->withdrawal_date = Jalalian::now()->format('Y/m/d');
        $this->todayTotal = Withdrawal::whereDate(
            'withdrawal_date',
            now()->toDateString()
        )->sum('amount');
        $startWeek = Carbon::now()->startOfWeek(Carbon::SATURDAY);
        $endWeek = Carbon::now()->endOfWeek(Carbon::FRIDAY);
        $this->weekTotal = Withdrawal::whereBetween(
            'withdrawal_date',
            [$startWeek->toDateString(), $endWeek->toDateString()]
        )->sum('amount');
        $nowJ = Jalalian::now();
        $startMonth = $nowJ->toCarbon()->startOfMonth();
        $endMonth = $nowJ->toCarbon()->endOfMonth();
        $this->monthTotal = Withdrawal::whereBetween(
            'withdrawal_date',
            [$startMonth->toDateString(), $endMonth->toDateString()]
        )->sum('amount');
    }
  protected $rules = [
    'withdrawal_type' => 'required|in:کرایه,مصارف,معاش,تعمیرکاری',
    'currency' => 'required|in:AFN,USD',
    'amount' => 'required|numeric|min:10',
    'description' => 'required|regex:/^[A-Za-z\x{0600}-\x{06FF}\s]+$/u|max:50',
];
    protected $messages = [
        'withdrawal_type.required' => '*نوع برداشت را انتخاب کنید',
        'amount.required' => '*مقدار برداشت را وارد کنید',
        'amount.numeric' => '*لطفا عدد وارد کنید',
        'amount.min' => '*حداقل مقدار برداشت 10 است',
        'description.required' => '*توضیحات برداشت الزامی میباشد',
        'description.regex' => '*فقط وارد کردن حروف مجاز است',
    ];
    public function delete($id)
    {
        Withdrawal::findOrFail($id)->delete();
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function edit($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $this->editing = true;
        $this->editMode = true;
        $this->editingId = $withdrawal->id;
        $this->withdrawal_type = $withdrawal->withdrawal_type;
        $this->amount = $withdrawal->amount;
        $this->currency = $withdrawal->currency ?? 'AFN';
        $this->description = $withdrawal->description;
        $this->withdrawal_date = Jalalian::fromDateTime(
            $withdrawal->withdrawal_date
        )->format('Y/m/d');
        $this->formKey = uniqid();
    }
    public function cancelEdit()
    {
        $this->editing = false;
        $this->editingId = null;
        $this->withdrawal_type = '';
        $this->amount = null;
        $this->description = '';
        $this->currency = 'AFN';
$this->editMode = false;
    }
    public function resetForm()
    {
        $this->resetErrorBag();
        $this->reset([
            'withdrawal_type',
            'amount',
            'description',
            'editing',
            'editingId',
            'successMessage',
            'currency',
'editMode',
        ]);
        $this->withdrawal_date = Jalalian::fromDateTime(now())
            ->format('Y/m/d');
        $this->formKey = uniqid();
        $this->currency = 'AFN';
        $this->resetValidation();
    }
    private function convertToEnglishNumbers($string)
    {
        $faNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $enNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($faNumbers, $enNumbers, $string);
    }
   public function save()
{
    $this->amount = $this->convertToEnglishNumbers($this->amount);
    $this->validate();
    $currency  = $this->currency ?? 'AFN';
    $newAmount = (float) $this->amount;
    [$totalIncomeAFN, $totalIncomeUSD] = $this->getTotalIncome();
    if ($this->editing) {
        $withdrawal = Withdrawal::findOrFail($this->editingId);
        $oldCurrency = $withdrawal->currency ?? 'AFN';
        $oldAmount   = (float) $withdrawal->amount;
        $availableAFN = $totalIncomeAFN + (($oldCurrency === 'AFN') ? $oldAmount : 0);
        $availableUSD = $totalIncomeUSD + (($oldCurrency === 'USD') ? $oldAmount : 0);
        if ($currency === 'AFN' && $availableAFN < $newAmount) {
            $this->addError('amount', 'برداشت کافی نیست');
            return;
        }
        if ($currency === 'USD' && $availableUSD < $newAmount) {
            $this->addError('amount', 'برداشت کافی نیست');
            return;
        }
        $withdrawal->update([
            'withdrawal_type' => $this->withdrawal_type,
            'amount' => $newAmount,
            'description' => $this->description,
            'currency' => $currency,
        ]);
        $this->successMessage = 'ویرایش با موفقیت انجام شد';
    } else {
        if ($currency === 'AFN' && $totalIncomeAFN < $newAmount) {
            $this->addError('amount', 'برداشت کافی نیست');
            return;
        }
        if ($currency === 'USD' && $totalIncomeUSD < $newAmount) {
            $this->addError('amount', 'برداشت کافی نیست');
            return;
        }
        Withdrawal::create([
            'withdrawal_type' => $this->withdrawal_type,
            'amount' => $newAmount,
            'description' => $this->description,
            'currency' => $currency,
            'withdrawal_date' => now()->toDateString(),
            'user_id'  => Auth::id(),
            'admin_id' => Auth::user()->admin_id ?? Auth::id(),
        ]);
        $this->successMessage = 'برداشت با موفقیت ثبت شد';
    }
    $this->resetForm();
}
    public function render()
    {
        $withdrawals = Withdrawal::query()
            ->when($this->search !== '', function ($q) {
                $q->where(function ($qq) {
                    $qq->where('withdrawal_type', 'like', "%{$this->search}%")
                        ->orWhere('amount', 'like', "%{$this->search}%");
                });
            })
            ->when($this->filterType !== '', function ($q) {
                $q->where('withdrawal_type', $this->filterType);
            })
            ->orderBy('created_at', 'asc')
            ->paginate(7);
        return view('livewire.mobile.accounts-page', compact('withdrawals'));
    }
}
