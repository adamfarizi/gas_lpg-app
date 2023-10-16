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
            'alamat' => 'Jl. Merdeka No. 123, Kelurahan Bahagia, Kecamatan Sentosa, Kota Fiktif A',
            'koordinat' => '112003141432',
            'no_hp' => '088111222',
        ]);

        // Tambahkan lebih banyak data admin jika diperlukan
    }
}
