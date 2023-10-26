<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Gas;
use App\Models\Transaksi;
use App\Models\Agen;
use App\Models\Kurir;
use App\Models\Lokasi;
use App\Models\Pengiriman;
use App\Models\Truck;
use App\Models\User;

class ProsesController extends Controller
{
    public function index() {
        $data['title'] = 'Proses';
        // Nav items
        $total_gas = Gas::sum('stock_gas');
        $kurir_tersedia = Kurir::where('status', 'tersedia')->count();
        $pesanan_masuk = Transaksi::where('id_pengiriman', null)->count();
        $pesanan_diproses = Pengiriman::whereNull('id_kurir')->whereNull('id_truck')->count();
        $pesanan_dikirim = Transaksi::where('status_pengiriman', 'Dikirim')->count();
        $pesanan_selesai = Transaksi::where('status_pengiriman', 'Diterima')->count();
        $transaksis = Transaksi::all();
        
        // Tabel konfirmasi Pembayaran
        $pembayaran = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar')
            ->orWhere('status_pembayaran', 'Proses');        
        })->get();
        
        // Tabel pesanan di proses
        $pengirimans = Pengiriman::all();
        if ($pengirimans->isNotEmpty()) {
            foreach ($pengirimans as $pengiriman) {
                $id_pengiriman = $pengiriman->id_pengiriman;
                $transaksi_proses = Transaksi::where('id_pengiriman', $id_pengiriman)->get();            
                $proses = Pengiriman::whereNull('id_kurir')->whereNull('id_truck')->get();
            }
        }
        else{
            $proses = Transaksi::whereHas('pembayaran', function ($query) {
                $query->where('status_pembayaran', 'Sudah Bayar');
            })->get();
            $transaksi_proses = null;
        }
        $kurirs = Kurir::where('status', 'tersedia')->pluck('name');
        $trucks = Truck::where('status', 'tersedia')->pluck('plat_truck');

        
        // Tabel pesanan dikirim
        $dikirim = Transaksi::where('status_pengiriman', 'Dikirim')->get();

        // Tabel pesanan diterima
        $diterima = Transaksi::where('status_pengiriman', 'Diterima')->get();
        $lokasis = Lokasi::all();

        return view('auth.proses.proses',[
            // Nav item
            'kurir_tersedia' => $kurir_tersedia,
            'total_gas' => $total_gas,
            'pesanan_masuk' => $pesanan_masuk,
            'pesanan_diproses' => $pesanan_diproses,
            'pesanan_dikirim' => $pesanan_dikirim,
            'pesanan_selesai' => $pesanan_selesai,
            // Tabel konfirmasi pembayaran
            'pembayaran' => $pembayaran,
            // Tabel pesanan diproses
            'proses' => $proses,
            'transaksi_proses' => $transaksi_proses,
            'kurirs' => $kurirs,
            'trucks' => $trucks,
            // tabel pesanan dikirim
            'dikirim' => $dikirim,
            // Tabel pesanan diterima
            'diterima' => $diterima,

            'lokasis' => $lokasis,
            'transaksis' => $transaksis
        ], $data);
    }

    public function realTimeData(){
        // Nav data
        $total_gas = Gas::sum('stock_gas');
        $kurir_tersedia = Kurir::where('status', 'tersedia')->count();
        $pesanan_diproses = Transaksi::where('status_pengiriman', 'Belum Dikirim')->count();
        $pesanan_selesai = Transaksi::where('status_pengiriman', 'Diterima')->count();

        $pembayaran = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar')
            ->orWhere('status_pembayaran', 'Proses');        
        })->get();

        return response()->json([
            'pembayaran' => $pembayaran,
            'total_gas' => $total_gas,
            'kurir_tersedia' => $kurir_tersedia,
            'pesanan_diproses' => $pesanan_diproses,
            'pesanan_selesai' => $pesanan_selesai,
        ]);

    }
    
    public function update_pembayaran(Request $request){ 
        $selectedIds = $request->input('id_transaksi');
        // Cari transaksi berdasarkan ID
        $transaksis = Transaksi::find($selectedIds);
        // Tambahkan data ke tabel pengiriman
        $id_pengiriman_new = Pengiriman::max('id_pengiriman') + 1;
        $format_resi = str_pad($id_pengiriman_new, 6, '0', STR_PAD_LEFT);
        $resi_pengiriman = 'SHIP(GTK)-' . $format_resi;
        Pengiriman::create([
            'id_pengiriman' => $id_pengiriman_new,
            'resi_pengiriman' => $resi_pengiriman,
            'id_truck' => null,
            'id_transaksi' => null,
        ]);

        foreach ($transaksis as $transaksi) {
            // Periksa apakah transaksi ditemukan
            if (!$transaksi) {
                return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
            }

            // Periksa apakah pembayaran ada sebelum mengaksesnya
            if ($transaksi->pembayaran) {
                // Periksa apakah status_pembayaran yang diterima adalah salah satu yang valid
                $status_pembayaran = 'Sudah Bayar'; // Ubah sesuai kebutuhan Anda
                $transaksi->pembayaran->status_pembayaran = $status_pembayaran;
                $transaksi->pembayaran->save();
                
                // Lanjutkan dengan pembaruan lainnya jika diperlukan
                $transaksi->id_admin = Auth::user()->id_admin;
                $transaksi->save();

                // Mengurai stock gas
                $id_gas = $transaksi->id_gas;
                $gas = Gas::find($id_gas);
                $gas_dibeli = $transaksi->jumlah_transaksi;
                $gas->stock_gas -= $gas_dibeli;
                $gas->save();
            } else {
                return redirect()->back()->with('error', 'Pembayaran tidak ditemukan.');
            }
            // Cek apakah nilai id_pengiriman_new valid
            if ($id_pengiriman_new) {
                $transaksi->id_pengiriman = $id_pengiriman_new;
                $transaksi->save();
            } 
        }
        return redirect()->back()->with('success', 'Status pembayaran berhasil diubah.');
    }

    public function update_dikirim(Request $request, $id_pengiriman,){
        $transaksi = Transaksi::find($id_pengiriman);

        $transaksi_dikirim = Transaksi::where('id_pengiriman', $id_pengiriman)->get();
        foreach ($transaksi_dikirim as $transaksi) {
            $transaksi->id_admin = Auth::user()->id_admin;
            $transaksi->status_pengiriman = 'Dikirim';
            $transaksi->save();
        }
        
        $request->validate([
            'name_kurir' => 'required|string',
            'plat_truck' => 'required|string',
        ]);

        $name_kurir = $request->input('name_kurir');
        $kurir = Kurir::where('name', $name_kurir)->first();
        $kurir->status = 'tidak tersedia';
        $kurir->save();
        $id_kurir = $kurir->id_kurir;
    
        $plat_truck = $request->input('plat_truck');
        $truck = Truck::where('plat_truck', $plat_truck)->first();
        $truck->status = 'tidak tersedia';
        $truck->save();
        $id_truck = $truck->id_truck;
    
        $pengiriman = $transaksi->pengiriman;
        
        $pengiriman->id_kurir = $id_kurir;
        $pengiriman->id_truck = $id_truck;
        $pengiriman->save();

        return redirect()->back()->with('success', 'Pesanan telah dikirim');
    }
    
    
}
