<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return in_array('view_user', $this->getPermissions());
    }


    public function view(User $user, User $model)
    {
        return in_array('view_user', $this->getPermissions());
    }


    public function create(User $user)
    {
        return in_array('create_user', $this->getPermissions());
    }

    public function update(User $user, User $model)
    {
        return in_array('update_user', $this->getPermissions());
    }


    public function delete(User $user, User $model)
    {
        return in_array('delete_user', $this->getPermissions());
    }


    public function restore(User $user, User $model)
    {

    }

    public function forceDelete(User $user, User $model)
    {
        return in_array('delete_user', $this->getPermissions());
    }
}
