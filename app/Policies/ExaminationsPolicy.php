<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\UserRole;
use App\Models\Examinations;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExaminationsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Examinations $exam)
    {
        return $user->role == UserRole::SUPER_ADMIN || $user->role == UserRole::ADMIN;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == UserRole::SUPER_ADMIN || $user->role == UserRole::ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Examinations $exam)
    {
        return $user->role == UserRole::SUPER_ADMIN || $user->role == UserRole::ADMIN;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    /* public function create(User $user)
    {
        //
    } */

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    /* public function update(User $user, Examinations $exam)
    {
        //
    } */

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Examinations $exam)
    {
        return false;
        return $user->role == UserRole::SUPER_ADMIN;
    }
    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\City  $city
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Examinations $exam)
    {
        return false;
        return $user->role == UserRole::SUPER_ADMIN;
    }
    
    /**
     * Determine whether the user can permanently delete multiple models.
     *
     * @param  mixed $user
     * @return void
     */
    public function deleteAny(User $user)
    {
        return false;
        return $user->role == UserRole::SUPER_ADMIN;
    }
}
