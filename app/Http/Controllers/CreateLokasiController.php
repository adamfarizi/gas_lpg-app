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
            'id_pengiriman' => 'required',
        ]);

        // Ambil data dari request
        $alamat_lokasi_tujuan = $request->alamat_lokasi_tujuan;
        $id_pengiriman = $request->id_pengiriman;

        // Tambahkan data ke tabel lokasi
        Lokasi::create([
            'koordinat_lokasi' => 'xxxxx', // Isi sesuai dengan data yang sesuai
            'alamat_lokasi_tujuan' => $alamat_lokasi_tujuan,
            'status_pengiriman' => 'Dikirim', // Isi sesuai dengan data yang sesuai
            'id_pengiriman' => $id_pengiriman,
        ]);

        // Redirect atau lakukan sesuatu yang sesuai dengan kebutuhan Anda
        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

}
