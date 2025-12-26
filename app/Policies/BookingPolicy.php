<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookingPolicy
{

    public function manageBooking(User $user)
    {
        if ($user->is_admin) {
            return true;
        }

        $hasAllowedPosition = Employee::where('email', $user->email)
            ->whereIn('position', ['assistant', 'Manager'])
            ->exists();

        return $hasAllowedPosition;
    }
}
