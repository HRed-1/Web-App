<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeDocument;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeDocumentPolicy
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
        return $user->can('view_any_type::document');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TypeDocument $typeDocument)
    {
        return $user->can('view_type::document');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_type::document');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TypeDocument $typeDocument)
    {
        return $user->can('update_type::document');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TypeDocument $typeDocument)
    {
        return $user->can('delete_type::document');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_type::document');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TypeDocument $typeDocument)
    {
        return $user->can('force_delete_type::document');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_type::document');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TypeDocument $typeDocument)
    {
        return $user->can('restore_type::document');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_type::document');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TypeDocument  $typeDocument
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, TypeDocument $typeDocument)
    {
        return $user->can('replicate_type::document');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_type::document');
    }

}
