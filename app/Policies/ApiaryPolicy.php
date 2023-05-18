<?php

namespace App\Policies;

use App\Models\Apiary;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApiaryPolicy
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
    public function view(User $user, Apiary $apiary): bool
    {
        return $user->id === $apiary->user_id; // sprawdź czy pasieka którą użytkownik próbuje wyświetlić należy do niego
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Apiary $apiary): bool
    {
        return $user->id === $apiary->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Apiary $apiary): bool
    {
        return $user->id === $apiary->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Apiary $apiary): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Apiary $apiary): bool
    {
        //
    }
}
