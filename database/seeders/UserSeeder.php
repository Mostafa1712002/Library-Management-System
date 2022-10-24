<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'developer',
                'email' => 'developer@developer.com',
                'password' => 'developer',
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
