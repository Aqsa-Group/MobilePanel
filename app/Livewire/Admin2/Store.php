<?php
namespace App\Livewire\Admin2;
use App\Models\Store as StoreModel;
use Livewire\Component;
use Livewire\WithPagination;
class Store extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function mount(): void
    {
        $adminUser = auth('admin2')->user();

        if (!$adminUser || !$adminUser->isAdmin()) {
            abort(403);
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $stores = StoreModel::query()
            ->with('adminUser')
            ->when(trim($this->search) !== '', function ($q) {
                $term = trim($this->search);
                $q->where(function ($inner) use ($term) {
                    $inner->where('store_name', 'like', '%' . $term . '%')
                        ->orWhere('owner_name', 'like', '%' . $term . '%')
                        ->orWhere('phone', 'like', '%' . $term . '%')
                        ->orWhere('address', 'like', '%' . $term . '%');
                });
            })
            ->when($this->statusFilter !== '', function ($q) {
                $q->where('status', (int) $this->statusFilter);
            })
            ->latest()
            ->paginate(12);

        return view('livewire.admin2.pages.store', [
            'stores' => $stores,
        ])->layout('livewire.admin2.layouts.app');
    }
}
