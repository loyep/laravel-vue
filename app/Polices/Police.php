<?php

namespace App\Polices;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Police
{
    use HandlesAuthorization;

    public function before(User $user)
    {
//        if ($user->isAdmin()) {
        return true;
//        }
    }
}
