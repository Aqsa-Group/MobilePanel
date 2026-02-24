<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UserForm;


class DeviceReport extends Model
{
    use HasFactory;

    protected $table = 'device_reports';

    protected $fillable = [
        'owner_full_name',
        'owner_phone',
        'owner_national_id',
        'owner_photo',

        'device_model',
        'device_imei',
        'device_image',

        'store_name',

        'incident_type',
        'incident_location',
        'incident_description',
        'incident_date',

        'status',
        'is_active',

        'ip_address',
        'user_agent',

        'admin_id',
        'admin_name',
    ];

    protected $casts = [
        'incident_date' => 'datetime',
        'is_active'     => 'boolean',
    ];

    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function user()
    {
        return $this->belongsTo(UserForm::class, 'user_id');
    }


    // فقط موارد فعال
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // فقط موارد در انتظار بررسی
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // فقط موارد تایید شده
    public function scopeVerified($query)
    {
        return $query->where('status', 'verified');
    }



    public function getIsLostAttribute()
    {
        return $this->incident_type === 'lost';
    }

    public function getIsStolenAttribute()
    {
        return $this->incident_type === 'stolen';
    }
}
