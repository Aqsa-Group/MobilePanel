<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserForm extends Authenticatable
{
    protected $table = 'user_forms';
    protected $fillable = [
        'name',
        'username',
        'email',
        'number',
        'address',
        'rule',
        'limit',
        'password',
        'image',
        'creator_id',
        'admin_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function creator()
    {
        return $this->belongsTo(UserForm::class, 'creator_id');
    }
    public function admin()
    {
        return $this->belongsTo(UserForm::class, 'admin_id');
    }
    public function children()
    {
        return $this->hasMany(UserForm::class, 'creator_id');
    }
}
