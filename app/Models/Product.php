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
        'image','user_id','admin_id',
    ];
    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function user()
    {
        return $this->belongsTo(UserForm::class, 'user_id');
    }
}
