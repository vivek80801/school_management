<?php

namespace App\Actions\User;

use App\Models\User;
use App\Services\UserService;

class createUser
{
    /**
    * @param $data
    */
    public function handle($data): User
    {
        $user_service = new UserService();
        return $user_service->create($data);
    }
}
