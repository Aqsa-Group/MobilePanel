<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SalaryPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'payment_date',
        'amount',
        'description'
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
