<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CustomerRecord extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'fullname',
        'address',
        'customer_type',
        'id_card',
        'customer_number',
        'image',
    ];
}
