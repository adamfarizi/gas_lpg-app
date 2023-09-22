<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Truck;

class TruckSeeder extends Seeder
{
    public function run()
    {
        $truckData = [
            [
                'plat_truck' => 'AB 1234 CD',
                'maksimal_beban_truck' => 5000,
            ],
            [
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

        foreach ($truckData as $data) {
            Truck::create($data);
        }
    }
}