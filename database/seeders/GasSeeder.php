<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gas;

class GasSeeder extends Seeder
{
    public function run()
    {
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

        foreach ($gasData as $data) {
            Gas::create($data);
        }
    }
}