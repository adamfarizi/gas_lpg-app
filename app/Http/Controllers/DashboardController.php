<?php

namespace App\Http\Controllers;

use App\Models\Agen;
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
        
        $kurir_tersedia = Kurir::where('status', 'tersedia')->count();

        $diterima = Transaksi::where('status_pengiriman', 'Diterima')->get();

        return view('auth.dashboard.dashboard',[
            'kurir_tersedia' => $kurir_tersedia,
            'diterima' => $diterima,
        ], $data);
    }
}
