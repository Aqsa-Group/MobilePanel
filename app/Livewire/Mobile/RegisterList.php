<?php

namespace App\Livewire\Mobile;

use App\Models\AppNotification;
use App\Models\RegisterDevice;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterList extends Component
{
    use WithPagination;

    public $statusFilter = 'approved';
    public $imeiSearch = '';
    public $selectedRegisterId = null;
    public $showDetailModal = false;

    public function mount(): void
    {
        $viewId = request()->query('view_register_id');
        if ($viewId) {
            $this->openRegisterDetails((int) $viewId);
        }
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
    }

    public function updatedImeiSearch(): void
    {
        $this->resetPage();
    }

    public function openRegisterDetails(int $id): void
    {
        $register = RegisterDevice::query()
            ->where('id', $id)
            ->where('submitted_by_user_id', auth()->id())
            ->first();

        if (!$register) {
            return;
        }

        $this->selectedRegisterId = $register->id;
        $this->showDetailModal = true;

        try {
            AppNotification::query()
                ->where('target_guard', 'web')
                ->where('target_user_id', auth()->id())
                ->where('is_read', false)
                ->where('payload->register_id', $register->id)
                ->update(['is_read' => true]);
        } catch (\Throwable $e) {
            report($e);
        }

        $this->dispatchSellerNotificationSync($register->id);
    }

    public function closeDetailModal(): void
    {
        $this->showDetailModal = false;
        $this->selectedRegisterId = null;
    }

    private function dispatchSellerNotificationSync(?int $registerId = null): void
    {
        $userId = (int) auth()->id();
        if ($userId <= 0) {
            return;
        }

        try {
            $unreadCount = AppNotification::forSeller($userId)
                ->where('is_read', false)
                ->count();

            $this->dispatch('seller-notifications-sync', unreadCount: $unreadCount, registerId: $registerId);
        } catch (\Throwable $e) {
            report($e);
        }
    }

    public function render()
    {
        $registers = RegisterDevice::query()
            ->with('submittedBy')
            ->where('submitted_by_user_id', auth()->id())
            ->when($this->statusFilter, function ($q) {
                $q->where('status', $this->statusFilter);
            })
            ->when(trim($this->imeiSearch) !== '', function ($q) {
                $q->where('imei', 'like', '%' . trim($this->imeiSearch) . '%');
            })
            ->latest()
            ->paginate(10);

        $selectedRegister = null;
        if ($this->selectedRegisterId) {
            $selectedRegister = RegisterDevice::query()
                ->where('id', $this->selectedRegisterId)
                ->where('submitted_by_user_id', auth()->id())
                ->first();

            if (!$selectedRegister) {
                $this->showDetailModal = false;
                $this->selectedRegisterId = null;
            }
        }

        return view('livewire.mobile.register-list', [
            'registers' => $registers,
            'selectedRegister' => $selectedRegister,
        ]);
    }
}
