<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function create($data): User
    {
        $user_repository = new UserRepository;

        return $user_repository->create($data);
    }
}
