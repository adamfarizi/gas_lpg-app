<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Saya Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin123')
            ],
            [
                'name'=>'Saya Agen',
                'email'=>'agen@gmail.com',
                'role'=>'agen',
                'password'=>bcrypt('agen123')
            ],
            [
                'name'=>'Saya Kurir',
                'email'=>'kurir@gmail.com',
                'role'=>'kurir',
                'password'=>bcrypt('kurir123')
            ]
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}