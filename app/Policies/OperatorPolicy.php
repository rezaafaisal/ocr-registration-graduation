<?php

namespace App\Policies;

use App\Models\Operator;
use App\Models\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperatorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Administrator $user)
    {
        return $user->is_super_administrator || $user->is_administrator;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, Operator $operator)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator $user)
    {
        return $user->is_super_administrator || $user->is_administrator;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, Operator $operator)
    {
        return $user->is_super_administrator || $user->is_administrator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, Operator $operator)
    {
        return $user->is_super_administrator || $user->is_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, Operator $operator)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, Operator $operator)
    {
        //
    }
}
