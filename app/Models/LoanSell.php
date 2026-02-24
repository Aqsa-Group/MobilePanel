<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class LoanSell extends Model
{protected $fillable = [
    'name',
    'model',
    'number',
    'quantity',
    'buy_price',
    'sell_price',
    'discount_amount',
    'profit_total',
    'barcode',
    'product_stock_id',
    'admin_id',
];
    public function productStock()
    {
        return $this->belongsTo(ProductStock::class, 'product_stock_id');
    }
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
}
