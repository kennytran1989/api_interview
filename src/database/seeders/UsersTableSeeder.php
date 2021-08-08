<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user =
            [
                'full_name' => 'User1',
                'email'     => 'user1@gmail.com',
                'role'      => 'user',
                'password'  => bcrypt('123456')
            ];

        \App\Models\User::create($user);

    }
}
