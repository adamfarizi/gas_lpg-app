<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class ApiKurirTransaksiController extends Controller
{
    public function pesanan_dikirim(string $id){
        
        $dikirim = Transaksi::where('status_pengiriman', 'dikirim')
        ->whereHas('pengiriman', function ($query) use ($id) {
            $query->where('id_kurir', $id);
        })->get();

        $resi_pengiriman = [];

        foreach ($dikirim as $transaksi) {
            $resi_pengiriman = $transaksi->pengiriman->first()->resi_pengiriman;
        }

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
                'resi' => $resi_pengiriman,
                'datauser' => $dikirim,
            ], 200); 
        }
    }

    public function detail_pesanan_agen(string $id){
        $data = Transaksi::where('id_agen', $id)
        ->join('pengiriman', 'transaksi.id_pengiriman', '=', 'pengiriman.id_pengiriman')
            ->get();


        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200); 
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $data,
            ], 200); 
        }
    }

    public function pesanan_selesai($id){

        $transaksi = Transaksi::find($id);
    
        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }
    
        // Periksa apakah transaksi sudah diterima sebelumnya
        if ($transaksi->status_pengiriman === 'Diterima') {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi sudah diterima sebelumnya',
            ], 400);
        }
    
        // Perbarui status pengiriman menjadi 'Diterima'
        $transaksi->status_pengiriman = 'Diterima';
        $transaksi->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Pesanan sudah diterima',
            'data' => $transaksi,
        ]);
    }
    
}
