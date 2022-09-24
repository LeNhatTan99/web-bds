<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PermissionPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return in_array('view_permission', $this->getPermissions());
    }


    public function view(User $user, Permission $permission)
    {
        return  in_array('view_permission', $this->getPermissions());
    }


    public function create(User $user)
    {
        return in_array('create_permission', $this->getPermissions());
    }


    public function update(User $user, Permission $permission)
    {
       in_array('update_permission', $this->getPermissions());
    }


    public function delete(User $user, Permission $permission)
    {

        return in_array('delete_role', $this->getPermissions());
    }

    public function restore(User $user, Permission $permission)
    {
    }

    public function forceDelete(User $user, Permission $permission)
    {
         in_array('delete_permission', $this->getPermissions());
    }


}
