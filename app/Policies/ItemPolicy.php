<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Employee;
use App\Models\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function  manageItem(User $user ,?Employee $employee=null)
    {
        return $user->is_admin 
                ||($employee && ($employee->position === 'storage_manager' ||  $employee->mgr_id === null));
    }
}