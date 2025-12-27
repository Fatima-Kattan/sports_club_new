<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacilityPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function manegeFacility(User $user)
    {
        if ($user->is_admin) {
            return true;
        }

        $hasAllowedPosition = Employee::where('email', $user->email)
            ->whereIn('position', ['Operations Manager','Facility Manager' ])
            ->exists();

        return $hasAllowedPosition;
    }
}
