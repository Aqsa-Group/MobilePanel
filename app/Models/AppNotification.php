<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AppNotification extends Model
{
    protected $fillable = [
        'target_guard',
        'target_user_id',
        'scope',
        'type',
        'title',
        'message',
        'payload',
        'is_read',
        'expires_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'is_read' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function scopeForSeller(Builder $query, int $userId): Builder
    {
        return $query->where('target_guard', 'web')
            ->where(function (Builder $q) use ($userId) {
                $q->where(function (Builder $single) use ($userId) {
                    $single->where('scope', 'single')->where('target_user_id', $userId);
                })->orWhere(function (Builder $broadcast) {
                    $broadcast->where('scope', 'broadcast_web');
                });
            })
            ->where(function (Builder $q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            });
    }

    public function scopeForAdmin2(Builder $query, int $userId): Builder
    {
        return $query->where('target_guard', 'admin2')
            ->where('target_user_id', $userId)
            ->where(function (Builder $q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            });
    }
}

