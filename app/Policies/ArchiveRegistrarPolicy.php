<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\ArchiveRegistrar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArchiveRegistrarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Administrator $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ArchiveRegistrar  $archiveRegistrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, ArchiveRegistrar $archiveRegistrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ArchiveRegistrar  $archiveRegistrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, ArchiveRegistrar $archiveRegistrar)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ArchiveRegistrar  $archiveRegistrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, ArchiveRegistrar $archiveRegistrar)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ArchiveRegistrar  $archiveRegistrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, ArchiveRegistrar $archiveRegistrar)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ArchiveRegistrar  $archiveRegistrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, ArchiveRegistrar $archiveRegistrar)
    {
        //
    }
}
