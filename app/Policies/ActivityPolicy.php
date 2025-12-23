<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employee;

class ActivityPolicy
{
    public function manageActivities(User $user, ?Employee $employee = null)
    {
        return  $user->is_admin|| ($employee && $employee->position === 'manager');
    }
}