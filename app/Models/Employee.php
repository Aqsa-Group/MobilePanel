<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserForm;
class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'nid', 'number', 'address', 'salary', 'job','user_id','admin_id'
    ];
    public function getJobFaAttribute()
    {
        $jobs = [
            'fixer' => 'تعمیرکار',
            'seller' => 'فروشنده',
        ];
        return $jobs[$this->job] ?? $this->job;
    }
     public function salaryPayments()
    {
        return $this->hasMany(SalaryPayment::class);
    }
    public function totalPaid()
    {
        return $this->salaryPayments()->sum('amount');
    }
    public function remainingSalary()
    {
        return $this->salary - $this->totalPaid();
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
