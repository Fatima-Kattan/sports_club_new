<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'full_name',
        'mgr_id',
        'salary',
        'specialization',
        'email',
        'phone_number',
        'working_hours_start',
        'working_hours_end',
        'role',
        'position',
        'years_of_experience',
        'hire_date',
        'image',
    ];

    protected $casts = [
        'working_hours_start' => 'datetime',
        'working_hours_end' => 'datetime',
        'hire_date' => 'date',
        'salary' => 'decimal:2',
        'years_of_experience' => 'integer',
        'mgr_id' => 'integer'

    ];

    protected $dates = [
        'deleted_at'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'employee_id');
    }


    public function manager()
    {
        return $this->belongsTo(Employee::class, 'mgr_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'mgr_id');
    }
    // Scope for coaches only
    public function scopeCoaches($query)
    {
        return $query->where('role', 'coach');
    }

    // Scope for employees only (non-coaches)
    public function scopeEmployees($query)
    {
        return $query->where('role', 'employee');
    }

    // Scope for employees with more than specified years of experience
    public function scopeExperienced($query, $years)
    {
        return $query->where('years_of_experience', '>=', $years);
    }

    // Function to get full name with position
    public function getFullNameWithPositionAttribute()
    {
        return "{$this->full_name} - {$this->position}";
    }

    // Function to check if coach
    public function isCoach()
    {
        return $this->role === 'coach';
    }

    // Function to check if regular employee
    public function isEmployee()
    {
        return $this->role === 'employee';
    }

    // Function to calculate employment duration
    public function getEmploymentDurationAttribute()
    {
        return $this->hire_date->diffInYears(now());
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}
