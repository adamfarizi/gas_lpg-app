<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ],[
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ],
    );

        // Tambahkan lebih banyak data admin jika diperlukan
    }
}
