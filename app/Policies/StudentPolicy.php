<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Operator;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Administrator|Operator $user)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator|Operator $user, Student $student)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator|Operator $user)
    {
        return match ($user::class) {
            Administrator::class => true,
            Operator::class => true,
        };
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator|Operator $user, Student $student)
    {
        return match ($user::class) {
            Administrator::class => true,
            Operator::class => false,
        };
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator|Operator $user, Student $student)
    {
        return $user->is_administrator;
    }

    public function deleteAny(Administrator|Operator $user)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator|Operator $user, Student $student)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator|Operator $user, Student $student)
    {
        return $user->is_administrator;
    }
}
