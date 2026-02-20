<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products_stock';
    protected $fillable = [
        'barcode',
        'model',
        'category',
        'brand',
        'status',
        'buy_price',
        'stock',
        'admin_id',
        'imei'

    ];
    protected $appends = ['status_fa', 'category_fa', 'brand_fa'];

    public function getStatusFaAttribute()
    {
        return match ($this->status) {
            'new'     => 'نو',
            'used'    => 'کارکرده',
            'damaged' => 'معیوب',
            default   => '--',
        };
    }

    public function getBrandFaAttribute()
    {
        return match ($this->brand) {
            'apple'   => 'اپل',
            'samsung' => 'سامسونگ',
            'xiaomi'  => 'شیائومی',
            'huawei'  => 'هواوی',
            default   => '--',
        };
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
