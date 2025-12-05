<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function  manageCategories(User $user ,Employee $employee)
    {
        return $user->is_admin || $employee->position === 'storage_manager' ||$employee->mgr_id === null;;
    }
    
}
