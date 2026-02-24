<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashSell extends Model
{
    protected $table = 'cash_sells';

  protected $fillable = [
    'customer_id',
    'model',
    'number',
    'quantity',
    'buy_price',
    'sell_price_retail',
    'discount_amount',
    'profit_total',
    'barcode',
    'id_card',
    'address',
    'admin_id',
];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
 public function prouduct()
    {
        return $this->belongsTo(Product::class);
    }

    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }

}
