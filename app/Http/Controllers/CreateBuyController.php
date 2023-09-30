<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Lokasi;
use App\Models\Transaksi;

class CreateBuyController extends Controller
{
    public function createData(Request $request){
        $id_pengiriman_new = Pengiriman::max('id_pengiriman') + 1;

        $id_transaksi_new = Transaksi::max('id_transaksi') + 1;
        $format_resi = str_pad($id_transaksi_new, 6, '0', STR_PAD_LEFT);
        $resi_transaksi = 'GTK-' . $format_resi;

        $id_pembayaran_new = Pembayaran::max('id_pembayaran') + 1;

        // Tambahkan data ke tabel pembayaran
        Pembayaran::create([
            'status_pembayaran' => 'Belum Bayar',
            'tanggal_pembayaran' => null,
            'bukti_pembayaran' => null,
        ]);

        // Tambahkan data ke tabel pengiriman
        Pengiriman::create([
            'id_truck' => null,
            'id_transaksi' => null,
        ]);

        // Tambahkan data ke tabel lokasi
        Lokasi::create([
            'koordinat_lokasi' => 'xxxxx',
            'alamat_lokasi_tujuan' => 'Jl. Contoh',
            'status_pengiriman' => 'Belum Dikirim',
            'id_pengiriman' => $id_pengiriman_new,
        ]);

        // Tambahkan data ke tabel transaksi
        Transaksi::create([
            'tanggal_transaksi' => now(),
            'resi_transaksi' => $resi_transaksi,
            'jumlah_transaksi' => 5,
            'total_transaksi' => 150000,
            'id_agen' => 1,
            'id_admin' => 1,
            'id_gas' => 1,
            'id_pengiriman' => $id_pengiriman_new,
            'id_pembayaran' => $id_pembayaran_new,
        ]);

        return back();
    }
}

