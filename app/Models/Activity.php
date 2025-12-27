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
    public function items()
    {
        return $this->belongsToMany(Item::class, 'activity_item', 'activity_id', 'item_id')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
