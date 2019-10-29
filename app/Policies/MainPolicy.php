<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MainPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->isAdmin($user);
    }


    /**
     * Determine whether the user can delete the service.
     *
     * @return mixed
     */
    public function delete()
    {
        return false;
    }

}
