<?php

namespace App\Livewire\Admin2;

use App\Models\AppNotification;
use App\Models\DeviceReport;
use App\Models\RegisterDevice;
use App\Models\Store;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class Dashboard extends Component
{
    public function render()
    {
        $adminId = (int) auth('admin2')->id();

        $totalDevices = RegisterDevice::query()->count();
        $pendingDevices = RegisterDevice::query()->where('status', 'pending')->count();
        $approvedDevices = RegisterDevice::query()->where('status', 'approved')->count();
        $blockedDevices = RegisterDevice::query()->where('status', 'blocked')->count();

        $reportsTotal = DeviceReport::query()->count();
        $storesTotal = Store::query()->count();
        $activeStores = Store::query()->where('status', 1)->count();

        $alertsToday = 0;
        if ($adminId > 0) {
            $alertsToday = AppNotification::query()
                ->where('target_guard', 'admin2')
                ->where('created_at', '>=', now()->startOfDay())
                ->where(function ($query) use ($adminId) {
                    $query->where(function ($single) use ($adminId) {
                        $single->where('scope', 'single')
                            ->where('target_user_id', $adminId);
                    })->orWhere('scope', 'broadcast_admin2');
                })
                ->count();
        }

        $cards = [
            [
                'key' => 'total_devices',
                'value' => $totalDevices,
                'label' => 'کل دستگاه های ثبت شده',
            ],
            [
                'key' => 'pending_devices',
                'value' => $pendingDevices,
                'label' => 'دستگاه های در حال انتظار',
            ],
            [
                'key' => 'approved_devices',
                'value' => $approvedDevices,
                'label' => 'دستگاه های تایید شده',
            ],
            [
                'key' => 'blocked_devices',
                'value' => $blockedDevices,
                'label' => 'دستگاه های بلاک شده',
            ],
            [
                'key' => 'reports_total',
                'value' => $reportsTotal,
                'label' => 'کل گزارشات ثبت شده',
            ],
            [
                'key' => 'stores_total',
                'value' => $storesTotal,
                'label' => 'کل فروشگاه ها',
            ],
            [
                'key' => 'active_stores',
                'value' => $activeStores,
                'label' => 'فروشگاه های فعال',
            ],
            [
                'key' => 'alerts_today',
                'value' => $alertsToday,
                'label' => 'هشدار های امروز',
            ],
        ];

        $maxCardValue = max(array_map(static fn(array $card): int => (int) $card['value'], $cards));
        if ($maxCardValue < 1) {
            $maxCardValue = 1;
        }

        $cards = array_map(static function (array $card) use ($maxCardValue): array {
            $percent = (int) round(((int) $card['value'] / $maxCardValue) * 100);
            if ($percent < 0) {
                $percent = 0;
            }
            if ($percent > 100) {
                $percent = 100;
            }
            $card['percent'] = $percent;
            return $card;
        }, $cards);

        $chartLabels = [];
        $registerSeries = [];
        $blockedSeries = [];
        $jalaliMonthNames = [
            1 => 'حمل',
            2 => 'ثور',
            3 => 'جوزا',
            4 => 'سرطان',
            5 => 'اسد',
            6 => 'سنبله',
            7 => 'میزان',
            8 => 'عقرب',
            9 => 'قوس',
            10 => 'جدی',
            11 => 'دلو',
            12 => 'حوت',
        ];

        for ($i = 11; $i >= 0; $i--) {
            $monthDate = now()->copy()->subMonths($i);
            $monthStart = $monthDate->copy()->startOfMonth();
            $monthEnd = $monthDate->copy()->endOfMonth();

            $jalaliDate = Jalalian::fromCarbon($monthDate);
            $jalaliMonth = (int) $jalaliDate->getMonth();
            $monthLabel = $jalaliMonthNames[$jalaliMonth] ?? $monthDate->format('m');
            $chartLabels[] = $monthLabel;

            $registerSeries[] = RegisterDevice::query()
                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();

            $blockedSeries[] = RegisterDevice::query()
                ->where('status', 'blocked')
                ->whereBetween('created_at', [$monthStart, $monthEnd])
                ->count();
        }

        return view('livewire.admin2.pages.dashboard', [
            'cards' => $cards,
            'chartLabels' => $chartLabels,
            'registerSeries' => $registerSeries,
            'blockedSeries' => $blockedSeries,
        ])->layout('livewire.admin2.layouts.app');
    }
}
