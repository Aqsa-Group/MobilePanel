<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Withdrawal extends Model
{
    use HasFactory;
    protected $fillable = ['withdrawal_type', 'amount', 'description', 'withdrawal_date'];
}
