<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\UserService;

class createUser
{
    public function handle($data): User
    {
        $user_service = new UserService;

        return $user_service->create($data);
    }
}
