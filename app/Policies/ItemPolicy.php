<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Employee;
use App\Models\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function manageItem(User $user)
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