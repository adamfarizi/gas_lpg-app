<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Transaksi
        $data = [
            'tanggal_transaksi' => now(), // Tanggal transaksi sesuai kebutuhan Anda
            'resi_transaksi' => 'GTX-000001', // Nomor resi transaksi sesuai kebutuhan Anda
            'jumlah_transaksi' => 5, // Jumlah gas yang dibeli sesuai kebutuhan Anda
            'total_transaksi' => 150000, // Total harga transaksi sesuai kebutuhan Anda
            'id_agen' => 1, // ID agen sesuai kebutuhan Anda
            'id_gas' => 1, // ID gas sesuai kebutuhan Anda
            'id_pembayaran' => 1, // ID pembayaran sesuai kebutuhan Anda
            'id_admin' => 1, // ID admin sesuai kebutuhan Anda
            'id_pengiriman' => 1, // ID pengiriman sesuai kebutuhan Anda
        ];

        // Menambahkan data ke dalam tabel
        Transaksi::create($data);
    }
}
