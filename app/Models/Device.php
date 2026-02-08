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
        'image',
        'buy_price',
        'sell_price',
        'stock',
        'imei',
        'admin_id',
    ];
      protected $appends = ['status_fa', 'brand_fa', 'category_fa'];
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
            'oppo'    => 'اوپو',
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
