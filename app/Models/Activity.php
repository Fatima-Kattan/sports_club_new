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

    public function coaches()
    {
        return $this->hasManyThrough(
            Employee::class,
            Booking::class,
            'activity_id', // Foreign key on bookings table
            'id', // Foreign key on employees table
            'id', // Local key on activities table
            'employee_id' // Local key on bookings table
        )->distinct();
    }
}
