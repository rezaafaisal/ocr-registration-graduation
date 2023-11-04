<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Quota;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotaPolicy
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
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator $user)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    public function deleteAny(Administrator $user)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    public function archive(Administrator $user, Quota $quota)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
}
