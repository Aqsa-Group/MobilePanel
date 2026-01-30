<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserForm extends Authenticatable
{
    protected $table = 'user_forms';
    protected $fillable = [
    'first_name','last_name','username','email',
    'number','address','rule','limit','password',
    'image','creator_id'
];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function isOnline()
{
    return \DB::table('sessions')
        ->where('user_id', $this->id)
        ->where('last_activity', '>=', now()->subMinutes(30)->timestamp)
        ->exists();
}
public function getNameAttribute()
{
    return $this->first_name . ' ' . $this->last_name;
}
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
