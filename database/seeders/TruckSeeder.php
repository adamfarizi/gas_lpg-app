<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    public function run()
    {
<<<<<<< HEAD
=======
        // Data contoh untuk model Truck
>>>>>>> 607b06575dac27fba86cb915d5204e84dbf3c9f1
        $truckData = [
            [
                'plat_truck' => 'AB 1234 CD',
                'maksimal_beban_truck' => 5000,
            ],
            [
<<<<<<< HEAD
                'plat_truck' => 'BC 5678 EF',
                'maksimal_beban_truck' => 6000,
            ],
            [
                'plat_truck' => 'CD 9012 GH',
                'maksimal_beban_truck' => 5500,
            ],
            [
                'plat_truck' => 'DE 3456 IJ',
                'maksimal_beban_truck' => 7000,
            ],
            [
                'plat_truck' => 'EF 7890 KL',
                'maksimal_beban_truck' => 6500,
            ],
        ];

=======
                'plat_truck' => 'XY 5678 ZW',
                'maksimal_beban_truck' => 7500,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
>>>>>>> 607b06575dac27fba86cb915d5204e84dbf3c9f1
        foreach ($truckData as $data) {
            Truck::create($data);
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 607b06575dac27fba86cb915d5204e84dbf3c9f1
