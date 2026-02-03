<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;
use Illuminate\Database\Eloquent\Casts\Attribute;
class CashReceipt extends Model
{
    protected $fillable = [
        'customer_id',
        'amount',
        'note',
        'receipt_date',
        'admin_id'

    ];
   public function customer() {
    return $this->belongsTo(Customer::class);
}
public function loan()
{
    return $this->belongsTo(Loan::class, 'loan_id');
}

protected function amount(): Attribute
{
    return Attribute::make(
        set: fn ($value) => str_replace(
            ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'],
            ['0','1','2','3','4','5','6','7','8','9'],
            $value
        )
    );
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
