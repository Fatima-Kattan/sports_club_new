<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Employee;

class EmployeePolicy
{
    public function  manageEmployees(User $user ,Employee $employee)
    {
        return $user->is_admin || $employee->position === 'manager' || $user->position === 'hr';
    }

    
}
