<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gas;

class GasSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
        $gasData = [
            [
                'jenis_gas' => 'Premium',
                'harga_gas' => 8000,
                'stock_gas' => 100,
            ],
            [
                'jenis_gas' => 'Pertalite',
                'harga_gas' => 9000,
                'stock_gas' => 120,
            ],
            [
                'jenis_gas' => 'Pertamax',
                'harga_gas' => 10000,
                'stock_gas' => 90,
            ],
            [
                'jenis_gas' => 'Dexlite',
                'harga_gas' => 8500,
                'stock_gas' => 110,
            ],
            [
                'jenis_gas' => 'Solar',
                'harga_gas' => 7500,
                'stock_gas' => 80,
            ],
        ];

=======
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
>>>>>>> 607b06575dac27fba86cb915d5204e84dbf3c9f1
        foreach ($gasData as $data) {
            Gas::create($data);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 607b06575dac27fba86cb915d5204e84dbf3c9f1
