<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StrategyList;
use Illuminate\Auth\Access\HandlesAuthorization;

class StrategyListPolicy
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
        return $user->can('view_any_strategy::list');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, StrategyList $strategyList)
    {
        return $user->can('view_strategy::list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_strategy::list');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, StrategyList $strategyList)
    {
        return $user->can('update_strategy::list');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, StrategyList $strategyList)
    {
        return $user->can('delete_strategy::list');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_strategy::list');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, StrategyList $strategyList)
    {
        return $user->can('force_delete_strategy::list');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_strategy::list');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, StrategyList $strategyList)
    {
        return $user->can('restore_strategy::list');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_strategy::list');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\StrategyList  $strategyList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, StrategyList $strategyList)
    {
        return $user->can('replicate_strategy::list');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_strategy::list');
    }

}
