<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'agen', 'kurir'];

        foreach ($roles as $role) {
            for ($i = 1; $i <= 5; $i++) {
                $userData = [
                    'name' => "Saya $role $i",
                    'email' => "$role$i@gmail.com",
                    'role' => $role,
                    'password' => Hash::make("${role}123"),
                ];

                User::create($userData);
            }
        }
    }
}