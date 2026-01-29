<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CashFund extends Model
{
    use HasFactory;
    protected $fillable = ['afn_balance', 'usd_balance'];
}
