<?php

namespace App\Containers;

use App\Contracts\UserInterface;
use App\LegacyUser;

class UserContainerLegacy implements UserInterface
{

    public function getUserById($userId)
    {
        $currentUser = LegacyUser::whereId($userId)->get()->first();
        return $currentUser->vorname . ' ' . $currentUser->name;
    }
}
