<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool|Response
    {
        if ($user->role === User::ROLE_SUPER_ADMIN) {
            return Response::allow();
        }

        if ($user->role === User::ROLE_ADMIN) {
            $createdCount = $user->createdUsers()->count(); // همه کاربران ساخته شده شمرده می‌شوند

            if ($createdCount < 10) { // مثلا محدودیت 10 کاربر
                return Response::allow();
            }

            return Response::deny('شما اجازه ایجاد بیش از 10 کاربر را ندارید.');
        }

        return Response::deny('شما اجازه ایجاد کاربر را ندارید.');
    }


    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
