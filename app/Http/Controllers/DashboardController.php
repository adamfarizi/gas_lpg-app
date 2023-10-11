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
        
        $pesanan_diproses = Transaksi::where('status_pengiriman', 'Belum Dikirim')->count();
        $pesanan_dikirim = Transaksi::where('status_pengiriman', 'Dikirim')->count();
        $pesanan_selesai = Transaksi::where('status_pengiriman', 'Diterima')->count();
        
        $transaksis = Transaksi::all();
        
        $dataTransaksi = Transaksi::selectRaw('SUM(jumlah_transaksi) as total_transaksi, DATE_FORMAT(tanggal_transaksi, "%b %Y") as bulan')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        
        $total_gas = Gas::sum('stock_gas');
        $totalGasTerjual = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['Proses', 'Sudah Bayar']);
        })->sum('jumlah_transaksi');
        $jumlahTransaksiDiterima = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['Proses', 'Sudah Bayar']);
        })->sum('total_transaksi');

    //Peningkatan pembelian
        $bulanSekarang = date('n');
        $tahunSekarang = date('Y');
        // Dapatkan bulan dan tahun sebulan sebelumnya
        $bulanSebelumnya = $bulanSekarang - 1;
        $tahunSebelumnya = $tahunSekarang;
        // Handle kasus bulan Januari
        if ($bulanSebelumnya <= 0) {
            $bulanSebelumnya = 12;
            $tahunSebelumnya -= 1;
        }
        // Query untuk menghitung total pembelian pada bulan ini dengan status pembayaran "proses" atau "sudah bayar"
        $totalPembelianBulanSekarang = Transaksi::whereMonth('tanggal_transaksi', $bulanSekarang)
        ->whereYear('tanggal_transaksi', $tahunSekarang)
        ->whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
        })
        ->sum('jumlah_transaksi');
        // Query untuk menghitung total pembelian pada bulan sebelumnya dengan status pembayaran "proses" atau "sudah bayar"
        $totalPembelianBulanSebelumnya = Transaksi::whereMonth('tanggal_transaksi', $bulanSebelumnya)
        ->whereYear('tanggal_transaksi', $tahunSebelumnya)
        ->whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
        })
        ->sum('jumlah_transaksi');
        $PeningkatanPembelian = 0;
        if ($totalPembelianBulanSebelumnya > 0) {
            $PeningkatanPembelian = (($totalPembelianBulanSekarang - $totalPembelianBulanSebelumnya) / $totalPembelianBulanSebelumnya) * 100;
        }

    // Peningkatan Pemasukkan
        // Query untuk menghitung total pembelian pada bulan ini dengan status pembayaran "proses" atau "sudah bayar"
        $totalPemasukanBulanSekarang = Transaksi::whereMonth('tanggal_transaksi', $bulanSekarang)
        ->whereYear('tanggal_transaksi', $tahunSekarang)
        ->whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
        })
        ->sum('total_transaksi');
        // Query untuk menghitung total pembelian pada bulan sebelumnya dengan status pembayaran "proses" atau "sudah bayar"
        $totalPemasukanBulanSebelumnya = Transaksi::whereMonth('tanggal_transaksi', $bulanSebelumnya)
        ->whereYear('tanggal_transaksi', $tahunSebelumnya)
        ->whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
        })
        ->sum('total_transaksi');
        $PeningkatanPenjualan = 0;
        if ($totalPemasukanBulanSebelumnya > 0) {
            $PeningkatanPenjualan = (($totalPemasukanBulanSekarang - $totalPemasukanBulanSebelumnya) / $totalPemasukanBulanSebelumnya) * 100;
        }

        return view('auth.dashboard.dashboard',[
            'total_gas' => $total_gas,
            'pesanan_diproses' => $pesanan_diproses,
            'pesanan_dikirim' => $pesanan_dikirim,
            'pesanan_selesai' => $pesanan_selesai,
            'transaksis' => $transaksis,
            'dataTransaksi' => $dataTransaksi,
            'PeningkatanPembelian' => $PeningkatanPembelian,
            'PeningkatanPenjualan' => $PeningkatanPenjualan,
            'totalGasTerjual' => $totalGasTerjual,
            'jumlahTransaksiDiterima' => $jumlahTransaksiDiterima,
            
        ], $data);
    }
}
