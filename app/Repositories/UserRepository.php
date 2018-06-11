<?php
namespace App\Repositories;

use App\User;


class UserRepository
{
    public function create($request)
    {
        return User::create($request);
    }
}
