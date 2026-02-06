<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\UserService;

class CreateUser
{
    public function handle($data): User
    {
        $userService = new UserService;

        return $userService->create($data);
    }
}
