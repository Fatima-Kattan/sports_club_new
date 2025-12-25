<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'floor',
        'room_capacity'
    ];

    protected $casts = [
        'room_capacity' => 'integer'
    ];

    //Relationship with activities
    public function activities()
    {
        return $this->hasMany(Activity::class, 'facility_id');
    }
}
