<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Constants for roles
     */
    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;
    const ROLE_SHIPPER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'my_code',
        'status',
        'role',
        'work',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationships
     */
    public function addresses()
    {
        return $this->hasMany(Address::class, 'id_user');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user');
    }

    /**
     * Scopes for roles
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', self::ROLE_ADMIN);
    }

    public function scopeUsers($query)
    {
        return $query->where('role', self::ROLE_USER);
    }

    public function scopeShippers($query)
    {
        return $query->where('role', self::ROLE_SHIPPER);
    }

    /**
     * Role checking methods
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function isShipper(): bool
    {
        return $this->role === self::ROLE_SHIPPER;
    }
}
