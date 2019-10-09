<?php

namespace App\Policies;
use App\Contents;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any contents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the contents.
     *
     * @param  \App\User  $user
     * @param  \App\Contents  $contents
     * @return mixed
     */
    public function view(User $user, Contents $contents)
    {
        return TRUE;
    }

    /**
     * Determine whether the user can create contents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the contents.
     *
     * @param  \App\User  $user
     * @param  \App\Contents  $contents
     * @return mixed
     */
    public function update(User $user, Contents $contents)
    {
        return $user->id == $contents->id_user;
    }

    /**
     * Determine whether the user can delete the contents.
     *
     * @param  \App\User  $user
     * @param  \App\Contents  $contents
     * @return mixed
     */
    public function delete(User $user, Contents $contents)
    {
        return $user->id == $contents->id_user;
    }

    /**
     * Determine whether the user can restore the contents.
     *
     * @param  \App\User  $user
     * @param  \App\Contents  $contents
     * @return mixed
     */
    public function restore(User $user, Contents $contents)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the contents.
     *
     * @param  \App\User  $user
     * @param  \App\Contents  $contents
     * @return mixed
     */
    public function forceDelete(User $user, Contents $contents)
    {
        //
    }
}
