<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\Response;

class VacantPolicy
{
    /**
     * Determine whether the user can view any model
     */
    public function viewAny(User $user): bool
    {
        return $user->rol === 1; //? 1 = Reclutador
    }
    
    /**
     * Determine whether the user can create models
     */
    public function create(User $user): bool
    {
        return $user->rol === 1; //? 1 = Reclutador
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vacant $vacant): bool
    {
        return $user->id === $vacant->user_id;
    }
    
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacant $vacant): bool
    {
        return $user->id === $vacant->user_id;
    }

    public function apply(User $user): bool
    {
        return $user->rol === 2;
    }
}
