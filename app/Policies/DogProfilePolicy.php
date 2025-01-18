<?php

namespace App\Policies;

use App\Models\DogProfile;
use App\Models\User;

class DogProfilePolicy
{
    public function view(User $user, DogProfile $dogProfile)
    {
        return $user->id === $dogProfile->user_id;
    }
}