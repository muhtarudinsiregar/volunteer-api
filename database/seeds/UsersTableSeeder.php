<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin
        factory(App\User::class)->create(
            [
                'name' => 'admin1',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
            ]
        );

        // create user
        factory(App\User::class, 20)->create();
    }
}
