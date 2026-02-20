<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LoanSell extends Model
{protected $fillable = [
    'name',
    'model',
    'number',
    'buy_price',
    'sell_price',
    'barcode',
    'product_stock_id',
];
    public function productStock()
    {
        return $this->belongsTo(ProductStock::class, 'product_stock_id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
