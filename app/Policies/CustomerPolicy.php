<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkCustomer(User $user) {
        return($user->role == "customer"
        ? Response::allow()
        : Response::deny("You must be a member before accessing this page!") );
    }
}
