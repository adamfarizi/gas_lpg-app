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
                'name_gas' => 'Gas Melon',
                'berat_gas' => 3,
                'stock_gas' => 100,
                'harga_gas' => 20000,
                'jenis_gas' => 'Isi Ulang',
            ],
            [
                'name_gas' => 'Gas Melon',
                'berat_gas' => 3,
                'stock_gas' => 150,
                'harga_gas' => 150000,
                'jenis_gas' => 'Gas Baru',
            ],
            [
                'name_gas' => 'Gas Bright',
                'berat_gas' => 5.5,
                'stock_gas' => 100,
                'harga_gas' => 103000,
                'jenis_gas' => 'Isi Ulang',
            ],
            [
                'name_gas' => 'Gas Bright',
                'berat_gas' => 5.5,
                'stock_gas' => 150,
                'harga_gas' => 206000,
                'jenis_gas' => 'Gas Baru',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($gasData as $data) {
            Gas::create($data);
        }
    }
}
