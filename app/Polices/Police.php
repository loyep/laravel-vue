<?php

namespace App\Polices;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class Police.
 */
class Police
{
    use HandlesAuthorization;

    /**
     * @param User $user
     *
     * @return bool
     */
    public function before(User $user)
    {
        return true;
    }
}
