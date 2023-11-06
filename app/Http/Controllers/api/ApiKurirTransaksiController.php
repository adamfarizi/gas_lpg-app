<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Agen;
use Illuminate\Http\Request;

class ApiKurirTransaksiController extends Controller
{
    public function pesanan_dikirim(string $id){

        $data = Agen::select('agen.id_agen', 'agen.name', 'agen.koordinat', 'agen.alamat', 
                Transaksi::raw('(SELECT COUNT(*) FROM transaksi WHERE transaksi.id_agen = agen.id_agen AND transaksi.status_pengiriman = "dikirim") as jumlah_pesanan'))
                ->join('transaksi', 'transaksi.id_agen', '=', 'agen.id_agen')
                ->join('pengiriman', 'transaksi.id_pengiriman', '=', 'pengiriman.id_pengiriman')
                ->where('pengiriman.id_kurir', $id)
                ->where('status_pengiriman', 'dikirim')
                ->distinct()
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

    public function detail_pesanan_agen(string $id){
        $data = Transaksi::where('id_agen', $id)
        ->join('pengiriman', 'transaksi.id_pengiriman', '=', 'pengiriman.id_pengiriman')
        ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas')
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
}