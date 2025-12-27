<?php

namespace App\Policies;

use App\Models\Attendee;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AttendeePolicy
{
    public function manageAttendee(User $user)
    {
        if ($user->is_admin) {
            return true;
        }

        $hasAllowedPosition = Employee::where('email', $user->email)
            ->whereIn('position', ['assistant', 'Manager','Supervisor','coach'])
            ->exists();

        return $hasAllowedPosition;
    }
}
