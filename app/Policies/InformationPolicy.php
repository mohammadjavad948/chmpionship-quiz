<?php

namespace App\Policies;

use App\Information;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class InformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Information  $information
     * @return mixed
     */
    public function view(User $user, Information $information)
    {
        return $user->id === $information->quiz()->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Information  $information
     * @return mixed
     */
    public function update(User $user, Information $information)
    {
        $data = $information->quiz;

        return $user->id === $data["user_id"];
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Information  $information
     * @return mixed
     */
    public function delete(User $user, Information $information)
    {
        $data = $information->quiz;

        return $user->id === $data["user_id"];
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Information  $information
     * @return mixed
     */
    public function restore(User $user, Information $information)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Information  $information
     * @return mixed
     */
    public function forceDelete(User $user, Information $information)
    {
        //
    }
}
