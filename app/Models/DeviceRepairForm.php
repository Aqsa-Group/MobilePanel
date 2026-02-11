<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DeviceRepairForm extends Model
{
    protected $fillable = [
        'category',
        'name',
        'phone_number',
        'device_model',
        'repair_type',
        'repair_cost',
        'description',
        'visit_date',
        'user_id',
        'admin_id',
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
