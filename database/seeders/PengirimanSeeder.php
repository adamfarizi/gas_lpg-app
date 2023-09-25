<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengiriman;

class PengirimanSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Pengiriman dengan id_kurir dan id_truck null
        $pengirimanData = [
            [
                'id_kurir' => null,
                'id_truck' => null,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($pengirimanData as $data) {
            Pengiriman::create($data);
        }
    }
}
