<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
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
        return $user->type === 'ADMIN' || $user->type === 'TUTOR' ?  true :  false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->type === 'TUTOR' ?  true :  false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pet $pet)
    {
        return $user->id === $pet->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pet $pet)
    {
        return $user->type === 'ADMIN' ?  true :  false;
    }
}
