<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillable = [
        'barcode',
        'name',
        'category',
        'status',
        'buy_price',
        'sell_price_retail',
        'sell_price_wholesale',
        'total_buy',
        'paid_amount',
        'quantity',
        'image',
        'user_id',
        'admin_id',
    ];
    protected $appends = ['status_fa', 'category_fa'];
    public function getStatusFaAttribute()
    {
        return match ($this->status) {
            'new'     => 'نو',
            'used'    => 'کارکرده',
            'damaged' => 'معیوب',
            default   => '--',
        };
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
    public function getCategoryFaAttribute()
    {
        return match ($this->category) {
            'mobile' => 'موبایل',
            'tablet' => 'تبلت',
            'laptob' => 'لپتاب',
            default  => '--',
        };
    }
    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function user()
    {
        return $this->belongsTo(UserForm::class, 'user_id');
    }
}
