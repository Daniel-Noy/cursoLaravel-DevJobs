<?php

namespace App\Policies;

use App\Models\User;

class ApplicantPolicy
{
    /**
     * Determine whether the user can create models
     */
    public function create(User $user): bool
    {
        return $user->rol === 2; //? 2 = Desarollador
    }
}
