<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subvention;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubventionPolicy
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
        return $user->can('view_any_subvention');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Subvention $subvention)
    {
        return $user->can('view_subvention');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_subvention');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Subvention $subvention)
    {
        return $user->can('update_subvention');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Subvention $subvention)
    {
        return $user->can('delete_subvention');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_subvention');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Subvention $subvention)
    {
        return $user->can('force_delete_subvention');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_subvention');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Subvention $subvention)
    {
        return $user->can('restore_subvention');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_subvention');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subvention  $subvention
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Subvention $subvention)
    {
        return $user->can('replicate_subvention');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_subvention');
    }

}
