<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gas;

class GasSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Gas
        $gasData = [
            [
                'jenis_gas' => 'Gas A',
                'stock_gas' => 100,
                'harga_gas' => 30000,
            ],
            [
                'jenis_gas' => 'Gas B',
                'stock_gas' => 150,
                'harga_gas' => 45000,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($gasData as $data) {
            Gas::create($data);
        }
    }
}
