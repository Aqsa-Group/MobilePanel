<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserForm extends Model
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'rule',
        'limit',
        'password',
        'address',
        'number',
        'image',
    ];
}
