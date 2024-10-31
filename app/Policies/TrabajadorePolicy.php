<?php

namespace App\Policies;

use App\Models\administradore;
use App\Models\User;

class TrabajadorePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function viewAny(administradore $administradore)
    {
        return $administradore->rol == "superadmin" || $administradore->rol == "admin" || $administradore->rol == "base";
    }
    public function update(administradore $administradore)
    {
        return $administradore->rol == "superadmin" || $administradore->rol == "admin" || $administradore->rol == "base"
        ;
    }
    public function store(administradore $administradore)
    {
        return $administradore->rol == "superadmin" || $administradore->rol == "admin" || $administradore->rol == "base";
    }
    public function delete(administradore $administradore)
    {
        return $administradore->rol == "superadmin" || $administradore->rol == "admin" || $administradore->rol == "base";
    }
}
