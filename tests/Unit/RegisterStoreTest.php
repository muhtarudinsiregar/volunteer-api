<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Repositories\UserRepository;

class RegisterStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test for user repository store
     *
     * @return void
     */
    public function testStoreRegisterUser()
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'secret'
        ];

        // exercise
        $userRepo = new UserRepository();
        $userRepo->store($user);

        // verify
        $this->assertDatabaseHas('users', ['name' => $user['name'], 'email' => $user['email']]);
    }
}
