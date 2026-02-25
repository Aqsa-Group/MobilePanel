<?php

namespace App\Livewire\Admin2;

use App\Models\AppNotification;
use App\Models\RegisterDevice as RegisterDeviceModel;
use App\Services\SmsGateway;
use Livewire\Component;
use Livewire\WithPagination;

class RegisterDevice extends Component
{
    use WithPagination;

    public $statusFilter = 'pending';
    public $imeiSearch = '';
    public $selectedRegisterId = null;
    public $showDetailModal = false;
    public $detailStep = 1;
    public $reviewNote = '';
    public $notifications = [];
    public $showToast = false;
    public $toastMessage = '';

    public function mount(): void
    {
        $this->loadNotifications();

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

    public function loadNotifications(): void
    {
        $userId = (int) auth('admin2')->id();

        $this->notifications = AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where(function ($q) use ($userId) {
                $q->where(function ($single) use ($userId) {
                    $single->where('scope', 'single')->where('target_user_id', $userId);
                })->orWhere('scope', 'broadcast_admin2');
            })
            ->latest()
            ->limit(10)
            ->get()
            ->toArray();

        $lastUnread = AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where(function ($q) use ($userId) {
                $q->where(function ($single) use ($userId) {
                    $single->where('scope', 'single')->where('target_user_id', $userId);
                })->orWhere('scope', 'broadcast_admin2');
            })
            ->where('is_read', false)
            ->latest()
            ->first();

        if ($lastUnread) {
            $this->toastMessage = $lastUnread->message;
            $this->showToast = true;
        }
    }

    public function hideToast(): void
    {
        $this->showToast = false;
    }

    public function openRegisterDetails(int $id): void
    {
        $register = RegisterDeviceModel::find($id);
        if (!$register) {
            return;
        }

        $this->selectedRegisterId = $id;
        $this->detailStep = 1;
        $this->reviewNote = (string) ($register->review_note ?? '');
        $this->showDetailModal = true;

        AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where('is_read', false)
            ->where('payload->register_id', $id)
            ->update(['is_read' => true]);

        $this->loadNotifications();
    }

    public function closeDetailModal(): void
    {
        $this->showDetailModal = false;
        $this->selectedRegisterId = null;
        $this->reviewNote = '';
    }

    public function setDetailStep(int $step): void
    {
        $this->detailStep = max(1, min(3, $step));
    }

    public function approve(SmsGateway $sms): void
    {
        $register = RegisterDeviceModel::find($this->selectedRegisterId);
        if (!$register) {
            return;
        }

        $register->update([
            'status' => 'approved',
            'reviewed_by_admin2_id' => auth('admin2')->id(),
            'reviewed_at' => now(),
            'review_note' => trim($this->reviewNote) ?: null,
        ]);

        $customerName = trim((string) $register->customer_name);
        $imei = trim((string) $register->imei);
        $shopName = trim((string) ($register->shop_name ?? 'فروشگاه'));

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => $register->submitted_by_user_id,
            'scope' => 'single',
            'type' => 'register_approved',
            'title' => 'ثبت دستگاه تایید شد',
            'message' => "IMEI {$imei} تایید شد.",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('seller.register.list', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => null,
            'scope' => 'broadcast_web',
            'type' => 'register_approved_broadcast',
            'title' => 'ثبت جدید تایید شد',
            'message' => "دستگاه با IMEI {$imei} به نام {$customerName} از {$shopName} ثبت شد.",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('seller.register.list', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        if (!empty($register->customer_phone)) {
            $sms->send(
                (string) $register->customer_phone,
                "مشتری گرامی، ثبت دستگاه شما با IMEI {$imei} تایید شد."
            );
        }

        session()->flash('success', 'دستگاه تایید شد.');
        $this->closeDetailModal();
    }

    public function reject(SmsGateway $sms): void
    {
        $register = RegisterDeviceModel::find($this->selectedRegisterId);
        if (!$register) {
            return;
        }

        $register->update([
            'status' => 'blocked',
            'reviewed_by_admin2_id' => auth('admin2')->id(),
            'reviewed_at' => now(),
            'review_note' => trim($this->reviewNote) ?: 'رد شد توسط مدیریت',
        ]);

        $imei = trim((string) $register->imei);

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => $register->submitted_by_user_id,
            'scope' => 'single',
            'type' => 'register_blocked',
            'title' => 'ثبت دستگاه رد شد',
            'message' => "IMEI {$imei} رد شد. دلیل: {$register->review_note}",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('seller.register.list', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        if (!empty($register->customer_phone)) {
            $sms->send(
                (string) $register->customer_phone,
                "مشتری گرامی، ثبت دستگاه شما با IMEI {$imei} رد شد."
            );
        }

        session()->flash('success', 'دستگاه رد شد.');
        $this->closeDetailModal();
    }

    public function render()
    {
        $registers = RegisterDeviceModel::query()
            ->with('submittedBy')
            ->when($this->statusFilter, function ($q) {
                $q->where('status', $this->statusFilter);
            })
            ->when(trim($this->imeiSearch) !== '', function ($q) {
                $q->where('imei', 'like', '%' . trim($this->imeiSearch) . '%');
            })
            ->latest()
            ->paginate(12);

        $selectedRegister = $this->selectedRegisterId
            ? RegisterDeviceModel::find($this->selectedRegisterId)
            : null;

        return view('livewire.admin2.pages.register-device', [
            'registers' => $registers,
            'selectedRegister' => $selectedRegister,
        ])->layout('livewire.admin2.layouts.app');
    }
}
