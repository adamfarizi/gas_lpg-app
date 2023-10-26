<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use App\Models\Gas;
use App\Models\Pembayaran;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index() {
        $data['title'] = 'Dashboard';
        
        $transaksis = Transaksi::all();
        
        $dataTransaksi = Transaksi::selectRaw('SUM(jumlah_transaksi) as total_transaksi, DATE_FORMAT(tanggal_transaksi, "%b %Y") as bulan')
        ->groupBy('bulan')
        ->orderBy('bulan')
        ->get();
        

    //Peningkatan pembelian
        $tanggalSekarang = date('Y-m-d'); // Tanggal sekarang
        $tanggalSebelumnya = date('Y-m-d', strtotime('-1 day', strtotime($tanggalSekarang))); // Tanggal sehari sebelumnya
        
        // Query untuk menghitung total pembelian pada hari ini dengan status pembayaran "proses" atau "sudah bayar"
        $totalPembelianHariIni = Transaksi::whereDate('tanggal_transaksi', $tanggalSekarang)
            ->whereHas('pembayaran', function ($query) {
                $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
            })
            ->sum('jumlah_transaksi');
        
        // Query untuk menghitung total pembelian pada hari sebelumnya dengan status pembayaran "proses" atau "sudah bayar"
        $totalPembelianHariKemarin = Transaksi::whereDate('tanggal_transaksi', $tanggalSebelumnya)
            ->whereHas('pembayaran', function ($query) {
                $query->whereIn('status_pembayaran', ['proses', 'sudah bayar']);
            })
            ->sum('jumlah_transaksi');
        
        $PeningkatanPembelian = 0;
        
        if ($totalPembelianHariKemarin > 0) {
            $PeningkatanPembelian = (($totalPembelianHariIni - $totalPembelianHariKemarin) / $totalPembelianHariKemarin) * 100;
        }
    

    // Peningkatan Pemasukkan
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
            'transaksis' => $transaksis,
            'dataTransaksi' => $dataTransaksi,
            'PeningkatanPembelian' => $PeningkatanPembelian,
            'PeningkatanPenjualan' => $PeningkatanPenjualan,
        ], $data);
        
    }

    public function realTimeData(){
        // Nav data
        $total_gas = Gas::sum('stock_gas');
        $pesanan_diproses = Transaksi::where('status_pengiriman', 'Belum Dikirim')->count();
        $pesanan_dikirim = Transaksi::where('status_pengiriman', 'Dikirim')->count();
        $pesanan_selesai = Transaksi::where('status_pengiriman', 'Diterima')->count();
    
        // Chart 1 data
        $totalGasTerjual = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['Proses', 'Sudah Bayar']);
        })->sum('jumlah_transaksi');
        $jumlahTransaksiDiterima = Transaksi::whereHas('pembayaran', function ($query) {
            $query->whereIn('status_pembayaran', ['Proses', 'Sudah Bayar']);
        })->sum('total_transaksi');

        $transaksis = Transaksi::orderBy('created_at', 'desc')->get();
        foreach ($transaksis as $transaksi) {
            // Ambil data agen berdasarkan id_agen
            $agen = Agen::find($transaksi->id_agen);
            $transaksi->agen_name = $agen->name; 

            $alamat = Agen::find($transaksi->id_agen);
            $transaksi->agen_alamat = $alamat->alamat; 

            $pembayaran = Pembayaran::find($transaksi->id_pembayaran);
            $transaksi->status_pembayaran = $pembayaran->status_pembayaran; 
        }
        
        return response()->json([
            'transaksis' => $transaksis,
            'total_gas' => $total_gas,
            'pesanan_diproses' => $pesanan_diproses,
            'pesanan_dikirim' => $pesanan_dikirim,
            'pesanan_selesai' => $pesanan_selesai,
            'totalGasTerjual' => $totalGasTerjual,
            'jumlahTransaksiDiterima' => $jumlahTransaksiDiterima,
        ]);
    }
    

    public function realTimeChart1(){
        $dataTransaksi = Transaksi::selectRaw('SUM(CASE WHEN pembayaran.status_pembayaran IN ("Proses", "Sudah Bayar") THEN jumlah_transaksi ELSE 0 END) as total_transaksi, DATE_FORMAT(tanggal_transaksi, "%d %b") as hari')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->groupBy('hari')
            ->orderBy('tanggal_transaksi', 'DESC')
            ->take(7)
            ->get();
    
        $labels = $dataTransaksi->pluck('hari'); // Reverse the order to show the latest data first.
        $dataChart = $dataTransaksi->pluck('total_transaksi');
        
        return response()->json([
            'labels1' => $labels->toArray(),
            'data1' => $dataChart->toArray(),
        ]);
    }    

    public function realTimeChart2(){
        $dataTransaksi = Transaksi::selectRaw('SUM(total_transaksi) as total_transaksi, DATE_FORMAT(tanggal_transaksi, "%b %Y") as bulan')
        ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
        ->whereIn('pembayaran.status_pembayaran', ['Proses', 'Sudah Bayar'])
        ->groupBy('bulan')
        ->orderBy('tanggal_transaksi', 'ASC') // Mengurutkan berdasarkan bulan secara ascending
        ->take(10)
        ->get();

        // Data untuk labels dan data chart
        $labels = $dataTransaksi->pluck('bulan');
        $dataChart = $dataTransaksi->pluck('total_transaksi'); 
        
        return response()->json([
            'labels2' => $labels->toArray(),
            'data2' => $dataChart->toArray(),
        ]);
    }    
    
}
