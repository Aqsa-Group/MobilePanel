<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DeviceRepairForm extends Model
{
    protected $fillable = [
        'category',
        'name',
        'last_name',
        'brand_name',
        'phone_number',
        'device_model',
        'imei_number',
        'device_color',
        'device_status',
        'device_mode',
        'repair_type',
        'description',
        'possible_time',
        'delivery_date',
        'visit_date',
        'repair_cost',
        'user_id','admin_id',
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
