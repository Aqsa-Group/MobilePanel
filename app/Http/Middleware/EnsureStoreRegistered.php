<?php

namespace App\Http\Middleware;

use App\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStoreRegistered
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || !$user->isStoreAdmin()) {
            return $next($request);
        }

        if ($request->routeIs('store.onboarding') || $request->routeIs('logout')) {
            return $next($request);
        }

        $hasStore = Store::query()
            ->where('admin_user_id', $user->storeOwnerId())
            ->exists();

        if (!$hasStore) {
            return redirect()->route('store.onboarding');
        }

        return $next($request);
    }
}
