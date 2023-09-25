<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Pembayaran
        $pembayaranData = [
            [
                'status_pembayaran' => 'Belum Bayar',
                'tanggal_pembayaran' => null,
                'bukti_pembayaran' => null,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data ke dalam tabel
        foreach ($pembayaranData as $data) {
            Pembayaran::create($data);
        }
    }
}
