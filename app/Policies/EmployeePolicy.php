<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Employee;

class EmployeePolicy
{
    // public function  manageEmployees(User $user ,?Employee $employee =null )
    // {
    //     return $user->is_admin || $employee->position === 'manager' || $employee->position === 'hr';
    // }
    public function manageEmployees(User $user ,?Employee $employee = null)
    {
        return $user->is_admin 
            || ($employee && ($employee->position === 'manager' || $employee->position === 'hr'));
    }
    
}
