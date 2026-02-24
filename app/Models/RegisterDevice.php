<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterDevice extends Model
{
    protected $table = 'registers'; // 👈 مهم

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
    ];
}
