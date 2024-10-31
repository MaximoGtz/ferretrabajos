<?php

namespace App\Policies;

use App\Models\administradore;

class administradorePolicy
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
        return $administradore->rol == "superadmin" || $administradore->rol == "admin";
    }
    public function update(administradore $administradore)
    {
        return $administradore->rol == "superadmin";
    }
    public function store(administradore $administradore)
    {
        return $administradore->rol == "superadmin";
    }
    public function delete(administradore $administradore)
    {
        return $administradore->rol == "superadmin";
    }
}
