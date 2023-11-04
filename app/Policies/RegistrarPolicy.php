<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Operator;
use App\Models\Registrar;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrarPolicy
{
    use HandlesAuthorization;

    public function viewAny(Administrator|Operator $user)
    {
        return $user instanceof Administrator || $user->is_academic || $user->is_faculty;
    }
    public function view(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function create(Administrator|Operator $user)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function update(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function delete(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function deleteAny(Administrator|Operator $user)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function restore(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }
    public function forceDelete(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_super_administrator;
    }

    public function validate(Administrator|Operator $user, Registrar $registrar)
    {
        return $user instanceof Administrator || $user->is_academic || $user->is_faculty;
    }
    public function import(Administrator|Operator $user)
    {
        return $user instanceof Administrator || $user->is_academic || $user->is_faculty;
    }
    public function export(Administrator|Operator $user)
    {
        return $user instanceof Administrator || $user->is_academic || $user->is_faculty;
    }
}
