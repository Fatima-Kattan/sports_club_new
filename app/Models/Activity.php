<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'free_time',
        'level',
        'is_active',
        'facility_id',
    ];

    protected $casts = [
        'free_time' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activityItems()
    {
        return $this->hasMany(Activity_Item::class);
    }


    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id'); 
    }

    public function attendees()
    {
        return $this->hasManyThrough(
            Attendee::class,
            Booking::class,
            'activity_id', // Foreign key on bookings table
            'booking_id', // Foreign key on attendees table
            'id', // Local key on activities table
            'id' // Local key on bookings table
        );
    }
    
    public function users()
{
    return $this->belongsToMany(User::class, 'activity_user');
}
}
