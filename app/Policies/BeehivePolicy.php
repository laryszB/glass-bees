<?php

namespace App\Policies;

use App\Models\Apiary;
use App\Models\Beehive;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BeehivePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Beehive $beehive)
    {
        return $user->id === $beehive->apiary->user_id; // sprawdź czy ul który użytkownik próbuje wyświetlić należy faktycznie do niego
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Apiary $apiary)
    {
        return $user->id === $apiary->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Beehive $beehive): bool
    {
        return $user->id === $beehive->apiary->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Beehive $beehive): bool
    {
        return $user->id === $beehive->apiary->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Beehive $beehive): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Beehive $beehive): bool
    {
        //
    }
}
