<?php
namespace App\Repositories;

use App\User;


class UserRepository
{
    public function store($request)
    {
        return User::create($request);
    }
}
