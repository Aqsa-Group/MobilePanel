<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;
class Loan extends Model
{
    protected $fillable = [
        'customer_id',
        'amount',
        'note',
        'loan_date',
        'user_id',
        'admin_id',
    ];

public function cashReceipts()
{
    return $this->hasMany(CashReceipt::class, 'loan_id');
}

   public function customer() {
    return $this->belongsTo(Customer::class);
}
public function user() {
    return $this->belongsTo(UserForm::class);
}
   public function admin() {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
}
