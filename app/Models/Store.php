<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
