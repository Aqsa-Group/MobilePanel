<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Borrowing extends Model
{
    protected $table = 'borrowings';
    protected $fillable = ['amount', 'paid_amount', 'user_id', 'date'];
}
