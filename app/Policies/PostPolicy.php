<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PostPolicy extends BasePolicy
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
        return in_array('view_post', $this->getPermissions());
    }


    public function view(User $user, Post $post)
    {
        return $this->isAuthor($user, $post) || in_array('view_post', $this->getPermissions());
    }


    public function create(User $user)
    {
        return in_array('create_post', $this->getPermissions());
    }


    public function update(User $user, Post $post)
    {
        return $this->isAuthor($user, $post) || in_array('update_post', $this->getPermissions());
    }


    public function delete(User $user, Post $post)
    {
        if (!$this->isAuthor($user, $post) || !in_array('delete_post', $this->getPermissions())) {
            return back()->with('error', 'User can not delete posts');
            Response::deny('You do not own this post.');
        }
        return true;
    }

    public function restore(User $user, Post $post)
    {
    }

    public function forceDelete(User $user, Post $post)
    {
        return $this->isAuthor($user, $post) || in_array('delete_post', $this->getPermissions());
    }


    public function isAuthor(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
}
