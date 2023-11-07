<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\Response;

class VacantPolicy
{
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
}
