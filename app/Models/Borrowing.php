<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;
class Borrowing extends Model
{
    protected $table = 'borrowings';
    protected $fillable = ['amount', 'paid_amount', 'user_id', 'date','admin_id'];
    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function user()
    {
        return $this->belongsTo(UserForm::class, 'user_id');
    }
}
