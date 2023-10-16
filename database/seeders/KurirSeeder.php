<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kurir;

class KurirSeeder extends Seeder
{
    public function run()
{
    $kurirData = [
        [
            'name' => 'Kurir 1',
            'email' => 'kurir1@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '08666611111',
        ],
        [
            'name' => 'Kurir 2',
            'email' => 'kurir2@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '08666611155',
        ],
        [
            'name' => 'Kurir 3',
            'email' => 'kurir3@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '08666611144',
        ],
        [
            'name' => 'Kurir 4',
            'email' => 'kurir4@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '08666611122',
        ],
        [
            'name' => 'Kurir 5',
            'email' => 'kurir5@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '0866661113',
        ]
    ];

    foreach ($kurirData as $data) {
        Kurir::create($data);
    }

    // Tambahkan lebih banyak data admin jika diperlukan
}

}
