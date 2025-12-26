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
   /*  $isEmployeeManager = $employee && ($employee->position === 'Facility Manager' || $employee->position === 'Operations Manager'); */
    
    return $user->is_admin /* || $isEmployeeManager */;
}
}
