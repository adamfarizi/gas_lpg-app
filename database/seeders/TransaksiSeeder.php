<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Data contoh untuk model Transaksi
        $data = [
            'tanggal_transaksi' => Carbon::now(),
            'resi_transaksi' => 'GTK-' . now()->format('YmdHis') . Str::random(2), // Nomor resi transaksi sesuai kebutuhan Anda
            'jumlah_transaksi' => 5, // Jumlah gas yang dibeli sesuai kebutuhan Anda
            'total_transaksi' => 150000, // Total harga transaksi sesuai kebutuhan Anda
            'status_pengiriman' => 'Belum Dikirim',
            'id_agen' => 1, // ID agen sesuai kebutuhan Anda
            'id_gas' => 1, // ID gas sesuai kebutuhan Anda
            'id_pembayaran' => 1, // ID pembayaran sesuai kebutuhan Anda
            'id_admin' => 1, // ID admin sesuai kebutuhan Anda
            'id_pengiriman' => null, // ID pengiriman sesuai kebutuhan Anda
        ];

        // Menambahkan data ke dalam tabel
        Transaksi::create($data);
    }
}
