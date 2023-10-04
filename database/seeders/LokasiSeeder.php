<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Lokasi
        $lokasiData = [
            [
                'koordinat_lokasi' => '123.456,789.012',
                'alamat_lokasi_tujuan' => 'Jl. Contoh 123, Kota Contoh',
                'id_transaksi' => 1, // id_pengiriman null
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($lokasiData as $data) {
            Lokasi::create($data);
        }
    }
}
