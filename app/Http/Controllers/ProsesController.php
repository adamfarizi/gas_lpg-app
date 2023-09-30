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
        $pesanan_masuk = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar');
        })->count();
        $pesanan_diproses = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Sudah Bayar');
        })->whereHas('pengiriman', function ($query) {
            $query->whereNull('id_kurir')->whereNull('id_truck');
        })->count();
        $pesanan_dikirim = Lokasi::where('status_pengiriman', 'Dikirim')->count();
        $pesanan_selesai = Lokasi::where('status_pengiriman', 'Diterima')->count();
        
        // Tabel konfirmasi Pembayaran
        $pembayaran = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar');
        })->get();
        
        // Tabel pesanan di proses
        $proses = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Sudah Bayar');
        })->whereHas('pengiriman', function ($query) {
            $query->whereNull('id_kurir')->whereNull('id_truck');
        })->get();
        $id_pengiriman_proses = [];
        $lokasi_proses = [];
        foreach ($proses as $transaksi) {
            $id_pengiriman_proses[] = $transaksi->id_pengiriman;
        }        
        foreach ($id_pengiriman_proses as $id) {
            $lokasi = Lokasi::where('id_pengiriman', $id)->first();
            if ($lokasi) {
                $lokasi_proses[] = $lokasi;
            }
        }
        $kurirs = Kurir::where('status', 'tersedia')->pluck('name');
        $trucks = Truck::where('status', 'tersedia')->pluck('plat_truck');
        
        // Tabel pesanan dikirim
        $id_dikirim = Lokasi::where('status_pengiriman', 'Dikirim')->pluck('id_pengiriman');
        $dikirim = Transaksi::whereIn('id_pengiriman', $id_dikirim)->get();
        $alamat_dikirim = Transaksi::whereHas('pengiriman', function ($query) {
            $query->whereNotNull('id_truck')->whereNotNull('id_kurir');
        })->get();
        $id_pengiriman_dikirim = [];
        $lokasi_dikirim = Lokasi::where('id_pengiriman', $id_pengiriman_dikirim)->get();
        foreach ($alamat_dikirim as $transaksi) {
            $id_pengiriman_dikirim[] = $transaksi->id_pengiriman;
        }

        // Tabel pesanan diterima
        $lokasi_selesai = Lokasi::where('status_pengiriman', 'Diterima')->pluck('id_pengiriman');
        $diterima = Transaksi::whereIn('id_pengiriman', $lokasi_selesai)->get();

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
            'lokasi_proses' => $lokasi_proses,
            'kurirs' => $kurirs,
            'trucks' => $trucks,
            // tabel pesanan dikirim
            'dikirim' => $dikirim,
            'lokasi_dikirim' => $lokasi_dikirim,
            // Tabel pesanan diterima
            'diterima' => $diterima,

            'lokasis' => $lokasis
        ], $data);
    }

    public function update_pembayaran(Request $request, $id){
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan.');
        }

        $status_pembayaran = $request->input('status_pembayaran');
        $transaksi->pembayaran->status_pembayaran = $status_pembayaran;
        $transaksi->pembayaran->save();

        $transaksi->id_admin = Auth::user()->id_admin;
        $transaksi->save();

        $id_gas = $transaksi->id_gas;
        $gas = Gas::find($id_gas);
        $gas_dibeli = $transaksi->jumlah_transaksi;
        $gas->stock_gas -= $gas_dibeli;
        $gas->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diubah.');
    }

    public function update_dikirim(Request $request, $id_transaksi){

        $transaksi = Transaksi::find($id_transaksi);

        $transaksi->id_admin = Auth::user()->id_admin;
        $transaksi->save();
        
        $name_kurir = $request->input('name');
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
        
        $id_pengiriman = $transaksi->pengiriman->id_pengiriman;
        $lokasi = Lokasi::where('id_pengiriman', $id_pengiriman)->first();
        $lokasi->status_pengiriman = 'Dikirim';
        $lokasi->save();
    
        return redirect()->back()->with('success', 'Pesanan telah dikirim');
    }
    
    
}
