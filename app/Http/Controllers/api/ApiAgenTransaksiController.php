<?php

namespace App\Http\Controllers\Api;

use App\Events\chart1Event;
use App\Events\chart2Event;
use App\Events\gastrackEvent;
use App\Events\newTranEvent;
use App\Http\Controllers\Controller;
use App\Models\Gas;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Lokasi;
use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ApiAgenTransaksiController extends Controller
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

        $transaksi_new = Transaksi::where('id_transaksi', $id_transaksi_new)->first();
        $agen_new = $transaksi_new->agen->name;
        broadcast(new newTranEvent($agen_new));

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambah',
            'datauser' => $transaksi_new,
            'databroadcast' => $agen_new,
        ], 200); 
    }

    public function transaksi_belum_bayar(){
        $belum_bayar = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar');
        })->get();

        if ($belum_bayar->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200); 
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $belum_bayar,
            ], 200); 
        }
    }

    public function update_pembayaran($id, Request $request) {
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);
    
        $dikirim = Pembayaran::where('id_pembayaran', $id)->first();
    
        if (!$dikirim) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }
    
        $dikirim->tanggal_pembayaran = Carbon::now();
        $dikirim->bukti_pembayaran = $request->input('bukti_pembayaran');
        $dikirim->status_pembayaran = 'Proses';
        $dikirim->save();

        $transaksi_new = Transaksi::whereHas('pembayaran', function ($query) use ($id) {
            $query->where('id_pembayaran', $id);
        })->first();
        
        $tanggal_transaksi = Carbon::parse($transaksi_new->tanggal_transaksi)->format('d M');
        $bulan_transaksi = Carbon::parse($transaksi_new->tanggal_transaksi)->format('M Y');
        $jumlah_transaksi = $transaksi_new->jumlah_transaksi;
        $total_transaksi = $transaksi_new->total_transaksi;
        $dataToBroadcast = [
            'tanggal_transaksi' => $tanggal_transaksi,
            'jumlah_transaksi' => $jumlah_transaksi,
            'total_transaksi' => $total_transaksi,
        ];
        
        broadcast(new chart1Event($tanggal_transaksi, $jumlah_transaksi));
        broadcast(new chart2Event($bulan_transaksi, $total_transaksi));
        
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $dikirim,
            'databroadcast' => $dataToBroadcast,
        ], 200);
    }
    

    public function transaksi_proses(){
        $proses = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Proses')
            ->orWhere('status_pembayaran', 'Sudah Bayar');
        })
        ->where('status_pengiriman', 'Belum Dikirim')
        ->get();
        

        if ($proses->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200); 
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $proses,
            ], 200); 
        }

    }

    public function transaksi_dikirim(){
        $dikirim = Transaksi::where('status_pengiriman', 'Dikirim')
        ->get();
        

        if ($dikirim->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200); 
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $dikirim,
            ], 200); 
        }

    }
    
    public function transaksi_diterima(){
        $dikirim = Transaksi::where('status_pengiriman', 'Diterima')
        ->get();

        if ($dikirim->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200); 
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $dikirim,
            ], 200); 
        }

    }
}
