<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;
class CustomerRecord extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'fullname',
        'customer_type',
        'customer_number',
        'address',
        'id_card',
        'image',
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
    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
