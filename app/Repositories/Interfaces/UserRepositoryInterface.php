<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @return User
     */
    public function create($data);

    public function get();

    public function edit();

    public function delete();
}
