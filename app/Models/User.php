<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users_list';
    protected $fillable = [
        'name',
        'last_name',
        'user_name',
        'email',
        'phone_number',
        'address',
        'image',
        'password',
        'role',
        'user_count_added',
        'created_by',
    ];
    protected $guarded = ['id'];
protected $casts = [
    'last_seen_at' => 'datetime',
];
 public function isOnline(): bool
    {
        return $this->last_seen_at
            ? $this->last_seen_at->gt(now()->subMinutes(30))
            : false;
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_by' => 'integer',
        ];
    }
  public function getAuthIdentifierName()
{
    return 'id';
}
    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    public function createdUsers()
    {
        return $this->hasMany(self::class, 'created_by');
    }
    public function isAdmin(): bool
    {
        return in_array($this->role, [
            self::ROLE_ADMIN,
            self::ROLE_SUPER_ADMIN
        ]);
    }
    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}
    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }
}
