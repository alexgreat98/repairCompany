<?php

namespace App\Policies;

use App\Service;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicePolicy
{

    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin($user)) {
            return true;
        }
    }


    public function create(User $user)
    {
        return $user->role === 'moderator';
    }

    /**
     * Determine whether the user can update the service.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role === 'moderator';
    }

    /**
     * Determine whether the user can delete the service.
     *
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function delete(User $user, Service $service)
    {
        //
    }

    /**
     * Determine whether the user can restore the service.
     *
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function restore(User $user, Service $service)
    {
        //
    }
}
