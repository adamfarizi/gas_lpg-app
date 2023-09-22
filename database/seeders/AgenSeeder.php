<?php
// database/seeders/AdminSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agen;

class AgenSeeder extends Seeder
{
    public function run()
    {
        $agen = Agen::create([
            'name' => 'Agen 1',
            'email' => 'agen1@example.com',
            'role' => 'agen',
            'password' => bcrypt('password1'),
            'alamat' => 'Jl. Agen 1',
        ]);

        // Tambahkan lebih banyak data admin jika diperlukan
    }
}
