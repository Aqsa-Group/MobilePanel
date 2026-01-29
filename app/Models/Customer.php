<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'fullname',
        'customer_type',
        'customer_number',
        'address',
        'id_card',
        'image',
        'phone',
        'admin_id'
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
