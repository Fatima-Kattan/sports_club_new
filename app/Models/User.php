<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'birth_date',
        'gender',
        'password',
        'email_verified_at', 
        'remember_token',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'birth_date' => 'date',
        'is_admin' => 'boolean', 
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->full_name;
    }

    public function isAdmin()
{
    return (bool) $this->is_admin;
}

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'members_id');
    }
}
