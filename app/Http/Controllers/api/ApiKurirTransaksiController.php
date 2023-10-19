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
}
