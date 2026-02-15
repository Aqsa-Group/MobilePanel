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
    'buy_price',
    'sell_price_retail',
    'profit_total',
    'barcode',
    'id_card',
    'address'
];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
 public function prouduct()
    {
        return $this->belongsTo(Product::class);
    }
    
}
