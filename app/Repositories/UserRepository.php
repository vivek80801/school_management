<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
    * @param $data
    */
    public function create($data): User
    {
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();
        return $user;
    }

    public function edit()
    {
        throw new \Exception('Not implemented');
    }

    public function delete()
    {
        throw new \Exception('Not implemented');
    }

    public function get()
    {
        throw new \Exception('Not implemented');
    }
}
