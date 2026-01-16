<?php
namespace App\Livewire\Mobile;
use Livewire\Component;
use App\Models\UserForm;
use Livewire\WithPagination;
class UserList extends Component
{
    public $search = '';
    public $rule = null;
    public $usersCount = 0;
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete($id)
    {
        UserForm::findOrFail($id)->delete();
        session()->flash('success', 'کاربر با موفقیت حذف شد');
    }
    public function render()
    {
        $users = UserForm::query()
            ->when($this->search, function ($q) {
                $q->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('number', 'like', "%{$this->search}%");
                });
            })
            ->when($this->rule, function ($q) {
                $q->where('rule', $this->rule);
            })
            ->latest()
            ->paginate(10);
        $this->usersCount = $users->count();
        return view('livewire.mobile.user-list', compact('users'));
    }
}
