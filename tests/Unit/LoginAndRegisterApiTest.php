<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginAndRegisterApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = [
            'email' => 'admin@gmail.com',
            'name' => 'admin',
            'password' => bcrypt('secret')
        ];
        $response = $this->post(route('api.register'), $user);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $this->assertDatabaseHas('users', $user);
    }

    public function testValidationRegisterUser()
    {
        $user = [
            'email' => 'admin@gmail.com',
            // 'name' => 'admin',
            'password' => bcrypt('secret')
        ];
        $response = $this->post(route('api.register'), $user, ['Content-Type', 'application/json']);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(
            [
                ' name ' => ' The name may not be greater than 50 characters .'
            ]
        );
    }
}
