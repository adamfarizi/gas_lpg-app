<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kurir;

class KurirSeeder extends Seeder
{
    public function run()
    {
        $kurir = Kurir::create([
            'name' => 'Kurir 1',
            'email' => 'kurir1@example.com',
            'role' => 'kurir',
            'password' => bcrypt('password1'),
            'status' => 'tersedia',
            'no_hp' => '08666611111',
        ]);

        // Tambahkan lebih banyak data admin jika diperlukan
    }
}
