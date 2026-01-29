<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'admin_id',
        'total_price',
        'note',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
