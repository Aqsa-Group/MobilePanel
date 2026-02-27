<?php

namespace App\Livewire\Mobile;

use App\Models\AppNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $selectedNotificationId = null;
    public bool $showDetailModal = false;

    public string $selectedTitle = '';
    public string $selectedMessage = '';
    public ?array $selectedPayload = null;
    public string $selectedCreatedAt = '-';

    public function mount(): void
    {
        $reportId = (int) request()->query('report_id', 0);
        if ($reportId > 0) {
            $notification = $this->baseQuery()
                ->where('payload->report_id', $reportId)
                ->latest()
                ->first();

            if ($notification) {
                $this->openDetail((int) $notification->id);
            }
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function openDetail(int $notificationId): void
    {
        $notification = $this->baseQuery()->where('id', $notificationId)->first();
        if (!$notification) {
            return;
        }

        $notification->update(['is_read' => true]);

        $this->selectedNotificationId = (int) $notification->id;
        $this->selectedTitle = (string) ($notification->title ?? '');
        $this->selectedMessage = (string) ($notification->message ?? '');
        $this->selectedPayload = (array) ($notification->payload ?? []);
        $this->selectedCreatedAt = $notification->created_at
            ? \Morilog\Jalali\Jalalian::fromDateTime($notification->created_at)->format('Y/m/d') . ' ' . $notification->created_at->format('h:i A')
            : '-';
        $this->showDetailModal = true;

        $reportId = (int) data_get($this->selectedPayload, 'report_id', 0);
        $this->dispatchSellerNotificationSync(null, $reportId > 0 ? $reportId : null);
    }

    public function closeDetailModal(): void
    {
        $this->showDetailModal = false;
        $this->selectedNotificationId = null;
        $this->selectedTitle = '';
        $this->selectedMessage = '';
        $this->selectedPayload = null;
        $this->selectedCreatedAt = '-';
    }

    private function dispatchSellerNotificationSync(?int $registerId = null, ?int $reportId = null): void
    {
        $userId = (int) auth()->id();
        if ($userId <= 0) {
            return;
        }

        $unreadCount = AppNotification::forSeller($userId)
            ->where('is_read', false)
            ->count();

        if ($registerId && $reportId) {
            $this->dispatch('seller-notifications-sync', unreadCount: $unreadCount, registerId: $registerId, reportId: $reportId);
            return;
        }

        if ($reportId) {
            $this->dispatch('seller-notifications-sync', unreadCount: $unreadCount, reportId: $reportId);
            return;
        }

        if ($registerId) {
            $this->dispatch('seller-notifications-sync', unreadCount: $unreadCount, registerId: $registerId);
            return;
        }

        $this->dispatch('seller-notifications-sync', unreadCount: $unreadCount);
    }

    private function baseQuery()
    {
        $userId = (int) Auth::id();

        return AppNotification::forSeller($userId)
            ->where('type', 'device_report_blocked');
    }

    public function render()
    {
        $alerts = $this->baseQuery()
            ->when(trim($this->search) !== '', function ($query) {
                $term = trim($this->search);
                $query->where(function ($inner) use ($term) {
                    $inner->where('title', 'like', '%' . $term . '%')
                        ->orWhere('message', 'like', '%' . $term . '%')
                        ->orWhere('payload->imei', 'like', '%' . $term . '%')
                        ->orWhere('payload->owner_full_name', 'like', '%' . $term . '%')
                        ->orWhere('payload->owner_phone', 'like', '%' . $term . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.mobile.reports', [
            'alerts' => $alerts,
        ]);
    }
}
