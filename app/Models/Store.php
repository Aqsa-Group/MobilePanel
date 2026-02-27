<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_user_id',
        'store_name',
        'owner_name',
        'address',
        'phone',
        'tazkira_id',
        'owner_photo',
        'license_number',
        'license_photo', // ← اینجا اصلاح شد
        'status',
    ];

    public function adminUser(): BelongsTo
    {
        return $this->belongsTo(UserForm::class, 'admin_user_id');
    }
}
