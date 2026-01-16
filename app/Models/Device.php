<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
 
    protected $table = 'devices';
     protected $fillable = [
        'category',
        'brand',
        'status',
        'model',
        'memory',
        'color',
        'image',
        'buy_price',
        'sell_price',
        'stock',
        'imei',
        'warranty',
    ];


}