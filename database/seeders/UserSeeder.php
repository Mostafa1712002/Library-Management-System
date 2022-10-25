<?php

namespace Database\Seeders;

use App\Enums\UserType;
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
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'admin',
                'type' => UserType::ADMIN,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
