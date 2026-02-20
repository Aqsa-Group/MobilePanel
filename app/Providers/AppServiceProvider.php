<?php

namespace App\Providers;

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
}
}
