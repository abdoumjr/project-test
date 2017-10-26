<?php

namespace App\Policies;

use App\User;
use App\cv;
use Illuminate\Auth\Access\HandlesAuthorization;

class cvpolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cv.
     *
     * @param  \App\User  $user
     * @param  \App\cv  $cv
     * @return mixed
     */
    public function view(User $user, cv $cv)
    {
        return true;
    }

    /**
     * Determine whether the user can create cvs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cv.
     *
     * @param  \App\User  $user
     * @param  \App\cv  $cv
     * @return mixed
     */
    public function update(User $user, cv $cv)
    {
        return $user->id == $cv->user_id;
    }

    /**
     * Determine whether the user can delete the cv.
     *
     * @param  \App\User  $user
     * @param  \App\cv  $cv
     * @return mixed
     */
    public function delete(User $user, cv $cv)
    {
        return $user->id == $cv->user_id;
    }
}
