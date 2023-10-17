<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gas;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Lokasi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class ApiTransaksiController extends Controller
{
    public function create_transaksi(Request $request){
        $validator = Validator::make($request->all(), [
            'id_agen' => 'required',
            'id_gas' => 'required',
            'jumlah_transaksi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Pembuatan resi
        $id_transaksi_new = Transaksi::max('id_transaksi') + 1;
        $format_resi = str_pad($id_transaksi_new, 6, '0', STR_PAD_LEFT);
        $resi_transaksi = 'GTK-' . $format_resi;

        // Pembuatan id pembayaran
        $id_pembayaran_new = Pembayaran::max('id_pembayaran') + 1;

        // Penghitungan total transaksi
        $jumlah_transaksi = intval($request->input('jumlah_transaksi'));
        $id_gas = intval($request->input('id_gas'));
        $harga_gas = Gas::where('id_gas', $id_gas)->pluck('harga_gas')->first(); // Menggunakan first() untuk mengambil nilai pertama
        $total_transaksi = $jumlah_transaksi * (float)$harga_gas; // Konversi $harga_gas ke float jika diperlukan

        // Tambahkan data ke tabel pembayaran
        Pembayaran::create([
            'status_pembayaran' => 'Belum Bayar',
            'tanggal_pembayaran' => null,
            'bukti_pembayaran' => null,
        ]);

        // Tambahkan data ke tabel transaksi
        Transaksi::create([
            'tanggal_transaksi' => now(),
            'resi_transaksi' => $resi_transaksi,
            'jumlah_transaksi' => $jumlah_transaksi,
            'total_transaksi' => $total_transaksi,
            'id_agen' => intval($request->id_agen),
            'id_admin' => 1,
            'id_gas' => $id_gas,
            'id_pembayaran' => $id_pembayaran_new,
            'id_pengiriman' => null,
        ]);
        
        // Tambahkan data ke tabel lokasi
        Lokasi::create([
            'koordinat_lokasi' => '123.456,789.012',
            'alamat_lokasi_tujuan' => 'Jl. Contoh 123, Kota Contoh',
            'id_transaksi' => $id_transaksi_new,
        ]);

        $transaksi = Transaksi::all();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $transaksi,
        ], 200); 
    }
}
