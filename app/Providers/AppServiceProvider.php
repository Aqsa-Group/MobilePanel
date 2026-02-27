<?php

namespace App\Providers;

use App\Models\AppNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\Authenticate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Authenticate::redirectUsing(function ($request) {
            if ($request->is('admin2/*')) {
                return route('admin2.login');
            }

            return route('login');
        });

        View::composer('Mobile.layouts.sidebar', function ($view) {
            if (!Schema::hasTable('app_notifications')) {
                $view->with('sidebarNotificationCount', 0)
                    ->with('sidebarNotifications', collect());
                return;
            }

            $userId = Auth::id();
            if (!$userId) {
                $view->with('sidebarNotificationCount', 0)
                    ->with('sidebarNotifications', collect());
                return;
            }

            $notifications = AppNotification::forSeller((int) $userId)
                ->latest()
                ->limit(8)
                ->get();

            $view->with('sidebarNotificationCount', $notifications->where('is_read', false)->count())
                ->with('sidebarNotifications', $notifications);
        });

        View::composer('livewire.admin2.components.sidebar', function ($view) {
            if (!Schema::hasTable('app_notifications')) {
                $view->with('adminSidebarNotificationCount', 0)
                    ->with('adminSidebarNotifications', collect());
                return;
            }

            $userId = Auth::guard('admin2')->id();
            if (!$userId) {
                $view->with('adminSidebarNotificationCount', 0)
                    ->with('adminSidebarNotifications', collect());
                return;
            }

            $baseQuery = AppNotification::query()
                ->where('target_guard', 'admin2')
                ->where(function ($q) use ($userId) {
                    $q->where(function ($single) use ($userId) {
                        $single->where('scope', 'single')
                            ->where('target_user_id', (int) $userId);
                    })->orWhere('scope', 'broadcast_admin2');
                })
                ->where(function ($q) {
                    $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
                });

            $notifications = (clone $baseQuery)
                ->where('is_read', false)
                ->latest()
                ->limit(8)
                ->get();

            $unreadCount = (clone $baseQuery)
                ->where('is_read', false)
                ->count();

            $badgeCount = $unreadCount;

            $view->with('adminSidebarNotificationCount', $badgeCount)
                ->with('adminSidebarNotifications', $notifications);
        });
    }
}
