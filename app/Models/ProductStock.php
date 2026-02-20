<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $table = 'products_stock';

    protected $fillable = [
        'category','brand','status','model','buy_price','sell_price','stock','barcode',
        'admin_id','admin_name','imei'
    ];
}
