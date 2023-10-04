<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class CreateLokasiController extends Controller
{
    public function createLocation(Request $request)
    {
        // Validasi input sesuai kebutuhan Anda
        $request->validate([
            'alamat_lokasi_tujuan' => 'required',
            'id_transaksi' => 'required',
        ]);

        // Ambil data dari request
        $alamat_lokasi_tujuan = $request->alamat_lokasi_tujuan;
        $id_transaksi = $request->id_transaksi;

        // Tambahkan data ke tabel lokasi
        Lokasi::create([
            'koordinat_lokasi' => '123.456,789.012',
            'alamat_lokasi_tujuan' => $alamat_lokasi_tujuan,
            'id_transaksi' => $id_transaksi,
        ]);

        // Redirect atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

}
