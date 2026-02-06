<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can('role.read')
            ? Response::allow()
            : Response::deny("you don't have permission");
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): Response
    {
        return $user->can('role.read')
            ? Response::allow()
            : Response::deny("you don't have permission");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->can('role.create')
            ? Response::allow()
            : Response::deny("you don't have permission");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): Response
    {
        if ($user->hasRole($role)) {
            return Response::deny('you can not update your own role');
        }

        if ($this->isProtectedRole($role)) {
            return Response::deny('you can not update Protected roles');
        }

        return $user->can('role.update')
                ? Response::allow()
                : Response::deny("you don't have permission");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): Response
    {
        if ($user->hasRole($role)) {
            return Response::deny('you can not delete your role');
        }

        if ($this->isProtectedRole($role)) {
            return Response::deny('you can not delete Protected roles');
        }

        return $user->can('role.delete')
                ? Response::allow()
                : Response::deny("you don't have permission");
    }

    public function isProtectedRole(Role $role): bool
    {
        return in_array($role->name, ['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return false;
    }
}
