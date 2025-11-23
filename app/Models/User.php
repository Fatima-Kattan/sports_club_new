<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name', 
        'email', 
        'phone_number',
        'birth_date',
        'gender', 
        'password',
    ];

    protected $casts = [
        'birth_date' => 'date'
    ];

    
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'members_id');
    }

}
