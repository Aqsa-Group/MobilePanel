<?php
namespace App\Livewire\Admin2;

use App\Models\AppNotification;
use App\Models\DeviceReport;
use App\Models\RegisterDevice;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class Reports extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $incidentFilter = '';
    public $selectedReportId = null;
    public $showDetailModal = false;
    public $blockReason = '';

    public function mount(): void
    {
        $adminUser = auth('admin2')->user();

        if (!$adminUser || !$adminUser->isAdmin()) {
            abort(403);
        }

        $viewId = (int) request()->query('view_report_id', 0);
        if ($viewId > 0) {
            $this->openReportDetails($viewId);
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

    public function updatedIncidentFilter(): void
    {
        $this->resetPage();
    }

    public function openReportDetails(int $reportId): void
    {
        $report = DeviceReport::query()->find($reportId);
        if (!$report) {
            return;
        }

        $this->selectedReportId = $reportId;
        $this->blockReason = trim((string) ($report->incident_description ?? ''));
        $this->showDetailModal = true;

        AppNotification::query()
            ->where('target_guard', 'admin2')
            ->where('is_read', false)
            ->where('payload->report_id', $reportId)
            ->update(['is_read' => true]);

        $this->dispatchAdminNotificationSync($reportId);
    }

    public function closeReportDetails(): void
    {
        $this->showDetailModal = false;
        $this->selectedReportId = null;
        $this->blockReason = '';
    }

    public function blockForSellers(): void
    {
        $report = DeviceReport::query()->find($this->selectedReportId);
        if (!$report) {
            return;
        }

        $imei = trim((string) $report->device_imei);
        if ($imei === '') {
            session()->flash('error', 'IMEI گزارش نامعتبر است.');
            return;
        }

        $reason = trim((string) $this->blockReason);
        if ($reason === '') {
            $reason = trim((string) $report->incident_description);
        }
        if ($reason === '') {
            $reason = 'گزارش سرقت/مفقودی توسط مدیریت تایید و برای فروشندگان بلاک شد.';
        }

        $adminId = (int) auth('admin2')->id();
        $sellerLink = route('reports', ['report_id' => $report->id]);
        $blockedCount = 0;

        DB::transaction(function () use ($report, $imei, $reason, $adminId, &$blockedCount, $sellerLink) {
            $registers = RegisterDevice::query()
                ->where(function ($query) use ($imei, $report) {
                    $query->where('imei', $imei);

                    $ownerName = trim((string) $report->owner_full_name);
                    $ownerPhone = trim((string) $report->owner_phone);
                    if ($ownerName !== '' && $ownerPhone !== '') {
                        $query->orWhere(function ($ownerQuery) use ($ownerName, $ownerPhone) {
                            $ownerQuery->where('customer_name', $ownerName)
                                ->where('customer_phone', $ownerPhone);
                        });
                    }
                })
                ->get();

            foreach ($registers as $register) {
                $register->update([
                    'status' => 'blocked',
                    'reviewed_by_admin2_id' => $adminId,
                    'reviewed_at' => now(),
                    'review_note' => "بلاک به دلیل گزارش IMEI {$imei}. دلیل: {$reason}",
                ]);
                $blockedCount++;
            }

            $report->update([
                'status' => 'verified',
            ]);

            $payload = [
                'report_id' => $report->id,
                'imei' => $imei,
                'owner_full_name' => (string) $report->owner_full_name,
                'owner_phone' => (string) $report->owner_phone,
                'device_model' => (string) $report->device_model,
                'incident_type' => (string) $report->incident_type,
                'incident_location' => (string) $report->incident_location,
                'incident_description' => (string) ($report->incident_description ?? ''),
                'owner_photo' => (string) ($report->owner_photo ?? ''),
                'device_image' => (string) ($report->device_image ?? ''),
                'reported_at' => $report->created_at ? $report->created_at->toDateTimeString() : null,
                'reason' => $reason,
                'link' => $sellerLink,
            ];

            AppNotification::create([
                'target_guard' => 'web',
                'target_user_id' => null,
                'scope' => 'broadcast_web',
                'type' => 'device_report_blocked',
                'title' => 'هشدار بلاک دستگاه',
                'message' => "IMEI {$imei} به دلیل گزارش سرقت/مفقودی بلاک شد. دلیل: {$reason}",
                'payload' => $payload,
                'expires_at' => now()->addDays(30),
            ]);
        });

        $this->dispatchAdminNotificationSync($report->id);
        session()->flash('success', "دستگاه برای فروشندگان بلاک شد. تعداد رکوردهای بروزرسانی‌شده: {$blockedCount}");
        $this->closeReportDetails();
    }

    private function dispatchAdminNotificationSync(?int $reportId = null): void
    {
        $userId = (int) auth('admin2')->id();
        if ($userId <= 0) {
            return;
        }

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

        $this->dispatch('admin-notifications-sync', unreadCount: $unreadCount, reportId: $reportId);
    }

    public function render()
    {
        $reportsQuery = DeviceReport::query()
            ->when(trim($this->search) !== '', function ($query) {
                $term = trim($this->search);
                $query->where(function ($inner) use ($term) {
                    $inner->where('owner_full_name', 'like', '%' . $term . '%')
                        ->orWhere('owner_phone', 'like', '%' . $term . '%')
                        ->orWhere('device_imei', 'like', '%' . $term . '%')
                        ->orWhere('device_model', 'like', '%' . $term . '%')
                        ->orWhere('store_name', 'like', '%' . $term . '%')
                        ->orWhere('admin_name', 'like', '%' . $term . '%');
                });
            })
            ->when($this->statusFilter !== '', function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when($this->incidentFilter !== '', function ($query) {
                $query->where('incident_type', $this->incidentFilter);
            });

        $reports = (clone $reportsQuery)
            ->latest()
            ->paginate(12);

        $startOfToday = now()->startOfDay();
        $todayTs = $startOfToday->getTimestamp();

        $stats = [
            'reports_today' => DeviceReport::query()->where('created_at', '>=', $startOfToday)->count(),
            'reports_total' => DeviceReport::query()->count(),
            'visitors_today' => DB::table('sessions')
                ->where('last_activity', '>=', $todayTs)
                ->distinct()
                ->count('ip_address'),
            'sellers_total' => Store::query()->count(),
        ];

        $selectedReport = null;
        if ($this->selectedReportId) {
            $selectedReport = DeviceReport::query()->find($this->selectedReportId);
        }

        return view('livewire.admin2.pages.reports', [
            'reports' => $reports,
            'stats' => $stats,
            'selectedReport' => $selectedReport,
        ])->layout('livewire.admin2.layouts.app');
    }
}
