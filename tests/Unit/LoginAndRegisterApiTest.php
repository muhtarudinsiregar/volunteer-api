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
    public function testRegister()
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

    public function testValidationRegisterUserIfNameNull()
    {
        $user = [
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret')
        ];
        $response = $this->post(
            route('api.register'),
            $user,
            [
                'Accept' => 'application/json'
            ]
        );

        $response->assertStatus(422);

        $response->assertJsonStructure(
            ['message', 'errors' => ['name']]
        );
    }
}
