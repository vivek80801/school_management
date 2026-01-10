<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function create($data): User
    {
        $userRepository = new UserRepository;

        return $userRepository->create($data);
    }
}
