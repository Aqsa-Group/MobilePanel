<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'barcode','name','category','status','company',
        'buy_price','sell_price_retail','sell_price_wholesale',
        'total_buy','paid_amount','quantity',
        'profit_each','profit_total','image'
    ];
}
