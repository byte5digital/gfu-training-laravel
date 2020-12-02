<?php

namespace App\Containers;

use App\Contracts\UserInterface;
use App\User;

class UserContainer implements UserInterface
{

    public function getUserById($userId)
    {
        $currentUser = User::whereId($userId)->get('name')->first();
        return $currentUser->name;
    }
}
