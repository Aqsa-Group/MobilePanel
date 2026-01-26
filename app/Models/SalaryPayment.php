<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
class SalaryPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'amount',
        'payment_date',
        'description',
        'admin_id'
    ];
    protected $dates = ['payment_date'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function getShamsiPaymentDateAttribute()
    {
        try {
            $date = $this->payment_date ?? Carbon::today();
            if (!($date instanceof Carbon)) {
                $date = Carbon::parse($date);
            }
            return Jalalian::fromDateTime($date)->format('Y/m/d');
        } catch (\Exception $e) {
            return '-';
        }
    }
}
