<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class UpdateLastSeenAt
{
    public function handle(Request $request, Closure $next)
    {
        $guard = 'admin2';
        if (auth($guard)->check()) {
            $user = auth($guard)->user();
            $lastSeen = $user->last_seen_at;
            $shouldUpdate = !$lastSeen || $lastSeen->lt(now()->subMinute());
            if ($shouldUpdate) {
                $user->forceFill(['last_seen_at' => now()])->save();
            }
        }
        return $next($request);
    }
}
