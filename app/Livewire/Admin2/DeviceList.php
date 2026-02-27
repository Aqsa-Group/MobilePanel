<?php
namespace App\Livewire\Admin2;

use App\Models\AppNotification;
use App\Models\RegisterDevice as RegisterDeviceModel;
use App\Services\SmsGateway;
use Livewire\Attributes\On;
use Livewire\Component;

class DeviceList extends Component
{
    public $selectedDeviceId = null;
    public $showDetailModal = false;
    public $reviewNote = '';
    public $openedFromNotification = false;

    public function openDeviceDetails(int $id, bool $fromNotification = false): void
    {
        $device = RegisterDeviceModel::find($id);
        if (!$device) {
            return;
        }

        $this->selectedDeviceId = $device->id;
        $this->reviewNote = (string) ($device->review_note ?? '');
        $this->openedFromNotification = $fromNotification;
        $this->showDetailModal = true;

        AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where('is_read', false)
            ->where('payload->register_id', $device->id)
            ->update(['is_read' => true]);

        $this->dispatchAdminNotificationSync($device->id);
    }

    #[On('open-device-detail')]
    public function openDeviceDetailsFromNotification($id = null): void
    {
        $resolvedId = is_array($id) ? ($id['id'] ?? null) : $id;
        if (!$resolvedId) {
            return;
        }

        $this->openDeviceDetails((int) $resolvedId, true);
    }

    public function closeDetailModal(): void
    {
        $this->showDetailModal = false;
        $this->selectedDeviceId = null;
        $this->reviewNote = '';
        $this->openedFromNotification = false;
    }

    public function approve(SmsGateway $sms): void
    {
        if (!$this->openedFromNotification) {
            return;
        }

        $device = RegisterDeviceModel::find($this->selectedDeviceId);
        if (!$device) {
            return;
        }

        if ((string) $device->status !== 'pending') {
            session()->flash('error', 'این مورد قبلاً بررسی شده است.');
            $this->dispatchAdminNotificationSync($device->id);
            return;
        }

        $device->update([
            'status' => 'approved',
            'reviewed_by_admin2_id' => auth('admin2')->id(),
            'reviewed_at' => now(),
            'review_note' => trim($this->reviewNote) ?: null,
        ]);

        $customerName = trim((string) $device->customer_name);
        $imei = trim((string) $device->imei);
        $shopName = trim((string) ($device->shop_name ?? 'فروشگاه'));

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => $device->submitted_by_user_id,
            'scope' => 'single',
            'type' => 'register_approved',
            'title' => 'ثبت دستگاه تایید شد',
            'message' => "IMEI {$imei} تایید شد.",
            'payload' => [
                'register_id' => $device->id,
                'link' => route('seller.register.list', ['view_register_id' => $device->id]),
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
                'register_id' => $device->id,
                'link' => route('seller.register.list', ['view_register_id' => $device->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        if (!empty($device->customer_phone)) {
            $sms->send(
                (string) $device->customer_phone,
                "مشتری گرامی، ثبت دستگاه شما با IMEI {$imei} تایید شد."
            );
        }

        $this->dispatchAdminNotificationSync($device->id);
        session()->flash('success', 'دستگاه تایید شد.');
        $this->closeDetailModal();
    }

    public function reject(SmsGateway $sms): void
    {
        if (!$this->openedFromNotification) {
            return;
        }

        $device = RegisterDeviceModel::find($this->selectedDeviceId);
        if (!$device) {
            return;
        }

        if ((string) $device->status !== 'pending') {
            session()->flash('error', 'این مورد قبلاً بررسی شده است.');
            $this->dispatchAdminNotificationSync($device->id);
            return;
        }

        $device->update([
            'status' => 'blocked',
            'reviewed_by_admin2_id' => auth('admin2')->id(),
            'reviewed_at' => now(),
            'review_note' => trim($this->reviewNote) ?: 'رد شد توسط مدیریت',
        ]);

        $imei = trim((string) $device->imei);

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => $device->submitted_by_user_id,
            'scope' => 'single',
            'type' => 'register_blocked',
            'title' => 'ثبت دستگاه رد شد',
            'message' => "IMEI {$imei} رد شد. دلیل: {$device->review_note}",
            'payload' => [
                'register_id' => $device->id,
                'link' => route('seller.register.list', ['view_register_id' => $device->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        if (!empty($device->customer_phone)) {
            $sms->send(
                (string) $device->customer_phone,
                "مشتری گرامی، ثبت دستگاه شما با IMEI {$imei} رد شد."
            );
        }

        $this->dispatchAdminNotificationSync($device->id);
        session()->flash('success', 'دستگاه رد شد.');
        $this->closeDetailModal();
    }

    private function dispatchAdminNotificationSync(?int $registerId = null): void
    {
        $userId = (int) auth('admin2')->id();

        $unreadCount = AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where(function ($q) use ($userId) {
                $q->where(function ($single) use ($userId) {
                    $single->where('scope', 'single')
                        ->where('target_user_id', $userId);
                })->orWhere('scope', 'broadcast_admin2');
            })
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->where('is_read', false)
            ->count();

        $this->dispatch('admin-notifications-sync', unreadCount: $unreadCount, registerId: $registerId);
    }

    public function render()
    {
        $query = RegisterDeviceModel::query()->with('submittedBy');

        if (request()->filled('imei')) {
            $query->where('imei', 'like', '%' . request('imei') . '%');
        }

        if (request()->filled('category')) {
            $query->where('category', request('category'));
        }

        if (request()->filled('model')) {
            $query->where('model', request('model'));
        }

        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }

        $devices = $query->oldest()->paginate(10)->withQueryString();
        $selectedDevice = $this->selectedDeviceId ? RegisterDeviceModel::find($this->selectedDeviceId) : null;

        return view('livewire.admin2.pages.device-list', [
            'devices' => $devices,
            'selectedDevice' => $selectedDevice,
        ])
            ->layout('livewire.admin2.layouts.app');
    }
}
