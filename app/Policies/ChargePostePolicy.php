<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ChargePoste;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChargePostePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_charge::poste');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ChargePoste $chargePoste)
    {
        return $user->can('view_charge::poste');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_charge::poste');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ChargePoste $chargePoste)
    {
        return $user->can('update_charge::poste');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ChargePoste $chargePoste)
    {
        return $user->can('delete_charge::poste');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_charge::poste');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ChargePoste $chargePoste)
    {
        return $user->can('force_delete_charge::poste');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_charge::poste');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ChargePoste $chargePoste)
    {
        return $user->can('restore_charge::poste');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_charge::poste');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ChargePoste  $chargePoste
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, ChargePoste $chargePoste)
    {
        return $user->can('replicate_charge::poste');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_charge::poste');
    }

}
