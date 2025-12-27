<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function manageCategories(User $user)
    {
        if ($user->is_admin) {
            return true;
        }

        $hasAllowedPosition = Employee::where('email', $user->email)
            ->whereIn('position', ['storage_manager', 'manager'])
            ->exists();

        return $hasAllowedPosition;
    }
    
}
