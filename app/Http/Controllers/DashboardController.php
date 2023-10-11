<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Agen;
use App\Models\Gas;
use App\Models\Kurir;
use App\Models\Lokasi;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $data['title'] = 'Dashboard';
        
        $total_gas = Gas::sum('stock_gas');
        $pesanan_diproses = Transaksi::where('status_pengiriman', 'Belum Dikirim')->count();
        $pesanan_dikirim = Transaksi::where('status_pengiriman', 'Dikirim')->count();
        $pesanan_selesai = Transaksi::where('status_pengiriman', 'Diterima')->count();

        $transaksis = Transaksi::all();

        $dataTransaksi = Transaksi::selectRaw('SUM(jumlah_transaksi) as total_transaksi, DATE_FORMAT(tanggal_transaksi, "%b %Y") as bulan')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();

        return view('auth.dashboard.dashboard',[
            'total_gas' => $total_gas,
            'pesanan_diproses' => $pesanan_diproses,
            'pesanan_dikirim' => $pesanan_dikirim,
            'pesanan_selesai' => $pesanan_selesai,
            'transaksis' => $transaksis,
            'dataTransaksi' => $dataTransaksi,
            
        ], $data);
    }
}
