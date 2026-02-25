<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegisterDevice extends Model
{
    protected $table = 'registers';

    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_tazkira_id',
        'customer_address',
        'customer_image',
        'tazkira_image',
        'category',
        'model',
        'color',
        'carton_image',
        'device_image',
        'imei',
        'status',
        'submitted_by_user_id',
        'shop_name',
        'reviewed_by_admin2_id',
        'reviewed_at',
        'review_note',
        'ai_report',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'ai_report' => 'array',
    ];

    public function submittedBy(): BelongsTo
    {
        return $this->belongsTo(UserForm::class, 'submitted_by_user_id');
    }
}
