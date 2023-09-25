<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Truck
        $truckData = [
            [
                'plat_truck' => 'AB 1234 CD',
                'maksimal_beban_truck' => 5000,
            ],
            [
                'plat_truck' => 'XY 5678 ZW',
                'maksimal_beban_truck' => 7500,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($truckData as $data) {
            Truck::create($data);
        }
    }
}
