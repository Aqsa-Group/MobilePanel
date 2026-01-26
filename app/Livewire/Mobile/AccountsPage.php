<?php
namespace App\Livewire\Mobile;
use Morilog\Jalali\Jalalian;
use Livewire\Component;
use App\Models\Withdrawal;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AccountsPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $withdrawal_type;
    public $withdrawal_date;
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
protected $listeners = ['setWithdrawalDate'];

public function setWithdrawalDate($date)
{
    $this->withdrawal_date = $date;
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
        $this->editingId = $withdrawal->id;
        $this->withdrawal_type = $withdrawal->withdrawal_type;
        $this->amount = $withdrawal->amount;
        $this->description = $withdrawal->description;
        $this->withdrawal_date = Jalalian::fromDateTime(
            $withdrawal->withdrawal_date
        )->format('Y/m/d');
    }
    public function cancelEdit()
    {
        $this->editing = false;
        $this->editingId = null;
        $this->withdrawal_type = '';
        $this->amount = null;
        $this->description = '';
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
        ]);
        $this->withdrawal_date = Jalalian::fromDateTime(now())
            ->format('Y/m/d');
    }
        private function convertToEnglishNumbers($string)
{
    $faNumbers = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
    $enNumbers = ['0','1','2','3','4','5','6','7','8','9'];
    return str_replace($faNumbers, $enNumbers, $string);
}
    public function save()
    {
        $this->amount = $this->convertToEnglishNumbers($this->amount);
        $this->validate();
        if ($this->editing) {
            Withdrawal::findOrFail($this->editingId)->update([
                'withdrawal_type' => $this->withdrawal_type,
                'amount' => $this->amount,
                'description' => $this->description,
            ]);
            $this->reset([
                'withdrawal_type',
                'amount',
                'description',
            ]);
            $this->successMessage = 'ویرایش با موفقیت انجام شد';
        } else {
            Withdrawal::create([
                'withdrawal_type' => $this->withdrawal_type,
                'amount' => $this->amount,
                'description' => $this->description,
                'withdrawal_date' => now()->toDateString(),
                'user_id'  => Auth::id(),
                'admin_id' => Auth::user()->admin_id ?? Auth::id(),
            ]);
            $this->successMessage = 'برداشت با موفقیت ثبت شد';
            $this->reset([
                'withdrawal_type',
                'amount',
                'description',
            ]);
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
