<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\AgenSeeder;
use Database\Seeders\KurirSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            AgenSeeder::class,
            KurirSeeder::class,
            GasSeeder::class,
            TruckSeeder::class,
            PembayaranSeeder::class,
            // PengirimanSeeder::class,
            TransaksiSeeder::class,
            LokasiSeeder::class,
        ]);
    }
}
