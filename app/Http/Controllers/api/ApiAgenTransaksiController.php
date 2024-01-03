<?php

namespace App\Http\Controllers\Api;

use App\Events\chart1Event;
use App\Events\chart2Event;
use App\Events\NewTransactionEvent;
use App\Events\gastrackEvent;
use App\Events\newTranEvent;
use App\Events\updateTranEvent;
use App\Http\Resources\PostResource;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Gas;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Agen;
use App\Models\Transaksi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;


class ApiAgenTransaksiController extends Controller
{
    public function index_transaksi($id_transaksi = null)
    {
        
        $cek_id_kurir = Transaksi::where('id_transaksi', $id_transaksi)->first();

        if ($cek_id_kurir['id_pengiriman'] == null) {
            $query = Transaksi::join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
                ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
                ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');
        } else {
            $query = Transaksi::join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->join('pengiriman', 'transaksi.id_pengiriman', '=', 'pengiriman.id_pengiriman')
                ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');
        }

        // Menambahkan kondisi berdasarkan id_transaksi jika disediakan
        if ($id_transaksi !== null) {
            $query->where('transaksi.id_transaksi', $id_transaksi);
        }

        if ($cek_id_kurir['id_pengiriman'] == null) {

            $transaksi = $query
                ->select([
                    'transaksi.id_transaksi',
                    'agen.name AS nama_agen',
                    'agen.koordinat AS koordinat',
                    Transaksi::raw('DATE_FORMAT(transaksi.created_at, "%Y-%m-%d %H:%i") as tanggal_pemesanan'),
                    'transaksi.status_pengiriman',
                    'transaksi.resi_transaksi',
                    'gas.name_gas AS nama_gas',
                    'gas.harga_gas',
                    'gas.jenis_gas',
                    'gas.berat_gas',
                    Transaksi::raw('DATE_FORMAT(pembayaran.tanggal_pembayaran, "%Y-%m-%d %H:%i") as tanggal_pembayaran'),
                    'pembayaran.status_pembayaran',
                    'transaksi.jumlah_transaksi',
                    'transaksi.total_transaksi',
                ])->get();
        } else {

            $transaksi = $query
                ->select([
                    'transaksi.id_transaksi',
                    'agen.name AS nama_agen',
                    'agen.koordinat AS koordinat',
                    Transaksi::raw('DATE_FORMAT(transaksi.created_at, "%Y-%m-%d %H:%i") as tanggal_pemesanan'),
                    Transaksi::raw('DATE_FORMAT(pengiriman.created_at, "%Y-%m-%d %H:%i") as tanggal_pengiriman'),
                    'transaksi.status_pengiriman',
                    'transaksi.resi_transaksi',
                    'gas.name_gas AS nama_gas',
                    'gas.harga_gas',
                    'gas.jenis_gas',
                    'gas.berat_gas',
                    Transaksi::raw('DATE_FORMAT(pembayaran.tanggal_pembayaran, "%Y-%m-%d %H:%i") as tanggal_pembayaran'),
                    'pembayaran.status_pembayaran',
                    'transaksi.jumlah_transaksi',
                    'transaksi.total_transaksi',
                    'pembayaran.bukti_pembayaran'
                ])->get();
        }

        if ($transaksi->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $transaksi,
            ], 200);
        }
    }

    public function create_transaksi(Request $request)
    {
        // Validasi permintaan
        $validator = Validator::make($request->all(), [
            'id_agen' => 'required|exists:agen,id_agen',
            'id_gas' => 'required|exists:gas,id_gas',
            'jumlah_transaksi' => 'required|integer|min:1',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
    
        $id_gas = $request->input('id_gas');
    
        // Periksa stok gas
        $stock_gas = Gas::where('id_gas', $id_gas)->value('stock_gas');
    
        if ($stock_gas <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Stok gas habis, tidak dapat melakukan transaksi.',
            ], 422);
        } 
        else{
            $jumlah_transaksi = intval($request->input('jumlah_transaksi'));
            if ($jumlah_transaksi > $stock_gas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stok gas tidak cukup, tidak dapat melakukan transaksi.',
                ], 422);
            }
            else {
                // Pembuatan resi dengan UUID
                $resi_transaksi = 'GTK-' . now()->format('YmdHis') . Str::random(2);
            
                // Penghitungan total transaksi
                $harga_gas = Gas::where('id_gas', $id_gas)->value('harga_gas');
                $total_transaksi = $jumlah_transaksi * (float)$harga_gas;
            
                // Tambahkan data ke tabel pembayaran
                $id_pembayaran_new = Pembayaran::create([
                    'status_pembayaran' => 'Belum Bayar',
                    'tanggal_pembayaran' => null,
                    'bukti_pembayaran' => null,
                ])->id_pembayaran;
            
                // Tambahkan data ke tabel transaksi
                $transaksi_new = Transaksi::create([
                    'tanggal_transaksi' => now(),
                    'resi_transaksi' => $resi_transaksi,
                    'jumlah_transaksi' => $jumlah_transaksi,
                    'total_transaksi' => $total_transaksi,
                    'id_agen' => $request->input('id_agen'),
                    'id_admin' => 1,
                    'id_gas' => $id_gas,
                    'id_pembayaran' => $id_pembayaran_new,
                    'id_pengiriman' => null,
                ]);
            
                // Kurangi stok gas
                Gas::where('id_gas', $id_gas)->decrement('stock_gas', $jumlah_transaksi);
            
                // Ambil nama agen
                $agen_new = Transaksi::where('id_transaksi', $transaksi_new->id_transaksi)->first()->agen->name;
                broadcast(new newTranEvent($agen_new));
            
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil ditambah',
                    'datauser' => $transaksi_new,
                    'databroadcast' => $agen_new,
                ], 200);
            }
        }
    }
    

    public function transaksi_belum_bayar($id_agen = null)
    {
        $query = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pembayaran', 'Belum Bayar');
        })
            ->join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');

        // Menambahkan kondisi berdasarkan id_agen jika disediakan
        if ($id_agen !== null) {
            $query->where('agen.id_agen', $id_agen);
        }

        $belum_bayar = $query
            ->select([
                'transaksi.id_transaksi',
                'agen.name AS nama_agen',
                'agen.koordinat AS koordinat',
                'transaksi.tanggal_transaksi',
                'transaksi.status_pengiriman',
                'transaksi.resi_transaksi',
                'gas.name_gas AS nama_gas',
                'gas.jenis_gas',
                'pembayaran.status_pembayaran',
                'transaksi.jumlah_transaksi',
                'transaksi.total_transaksi'
            ])
            ->orderBy('transaksi.tanggal_transaksi', 'desc')
            ->get();

        if ($belum_bayar->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $belum_bayar,
            ], 200);
        }
    }

    public function update_pembayaran($id, Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $dikirim = Pembayaran::where('id_pembayaran', $id)->first();

        if (!$dikirim) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }


        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('img/BuktiPembayaran'), $fileName);

            // Menyimpan informasi bukti pembayaran dalam basis data
            $dikirim->update([
                'tanggal_pembayaran' => now(),
                'bukti_pembayaran' => $fileName,
                'status_pembayaran' => 'Proses',
            ]);
        }

        $transaksi_new = Transaksi::whereHas('pembayaran', function ($query) use ($id) {
            $query->where('id_pembayaran', $id);
        })->first();

        $tanggal_transaksi = Carbon::parse($transaksi_new->tanggal_transaksi)->format('d M');
        $bulan_transaksi = Carbon::parse($transaksi_new->tanggal_transaksi)->format('M Y');
        $jumlah_transaksi = $transaksi_new->jumlah_transaksi;
        $total_transaksi = $transaksi_new->total_transaksi;
        $agen_name = $transaksi_new->agen->name;
        $dataToBroadcast = [
            'tanggal_transaksi' => $tanggal_transaksi,
            'jumlah_transaksi' => $jumlah_transaksi,
            'total_transaksi' => $total_transaksi,
        ];

        broadcast(new chart1Event($tanggal_transaksi, $jumlah_transaksi));
        broadcast(new chart2Event($bulan_transaksi, $total_transaksi));
        broadcast(new updateTranEvent($agen_name));

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $dikirim,
            'databroadcast' => $dataToBroadcast,
        ], 200);
    }


    public function transaksi_proses($id_agen = null)
    {
        $query = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where(function ($q) {
                $q->where('status_pembayaran', 'Proses')
                    ->orWhere('status_pengiriman', 'Belum Dikirim');
            })->whereNotIn('status_pembayaran', ['Belum Bayar']);
        })

            ->join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');

        // Menambahkan kondisi berdasarkan id_agen jika disediakan
        if ($id_agen !== null) {
            $query->where('agen.id_agen', $id_agen);
        }

        $proses = $query
            ->select([
                'transaksi.id_transaksi',
                'agen.name AS nama_agen',
                'transaksi.tanggal_transaksi',
                'pembayaran.status_pembayaran',
                'transaksi.status_pengiriman',
                'transaksi.resi_transaksi',
                'gas.name_gas AS nama_gas',
                'gas.jenis_gas',
                'transaksi.jumlah_transaksi',
                'transaksi.total_transaksi'
            ])
            ->orderBy('transaksi.tanggal_transaksi', 'desc')
            ->get();

        if ($proses->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $proses,
            ], 200);
        }
    }

    public function transaksi_dikirim($id_agen = null)
    {
        $query = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pengiriman', 'Dikirim');
        })
            ->join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->join('pengiriman', 'transaksi.id_pengiriman', '=', 'pengiriman.id_pengiriman')
            ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');

        // Menambahkan kondisi berdasarkan id_agen jika disediakan
        if ($id_agen !== null) {
            $query->where('agen.id_agen', $id_agen);
        }
        $dikirim = $query
            ->select([
                'transaksi.id_transaksi',
                'pengiriman.id_kurir',
                'agen.name AS nama_agen',
                'transaksi.tanggal_transaksi',
                'transaksi.status_pengiriman',
                'transaksi.resi_transaksi',
                'gas.name_gas AS nama_gas',
                'gas.jenis_gas',
                'pembayaran.status_pembayaran',
                'transaksi.jumlah_transaksi',
                'transaksi.total_transaksi'
            ])
            ->orderBy('transaksi.tanggal_transaksi', 'desc')
            ->get();

        if ($dikirim->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $dikirim,
            ], 200);
        }
    }

    public function transaksi_diterima($id_agen = null)
    {
        $query = Transaksi::whereHas('pembayaran', function ($query) {
            $query->where('status_pengiriman', 'Diterima');
        })
            ->join('agen', 'transaksi.id_agen', '=', 'agen.id_agen')
            ->join('pembayaran', 'transaksi.id_pembayaran', '=', 'pembayaran.id_pembayaran')
            ->join('gas', 'transaksi.id_gas', '=', 'gas.id_gas');

        // Menambahkan kondisi berdasarkan id_agen jika disediakan
        if ($id_agen !== null) {
            $query->where('agen.id_agen', $id_agen);
        }
        $diterima = $query
            ->select([
                'transaksi.id_transaksi',
                'agen.name AS nama_agen',
                'transaksi.tanggal_transaksi',
                'transaksi.status_pengiriman',
                'transaksi.resi_transaksi',
                'gas.name_gas AS nama_gas',
                'gas.jenis_gas',
                'pembayaran.status_pembayaran',
                'transaksi.jumlah_transaksi',
                'transaksi.total_transaksi'
            ])
            ->orderBy('transaksi.tanggal_transaksi', 'desc')
            ->get();

        if ($diterima->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan',
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data ditemukan',
                'datauser' => $diterima,
            ], 200);
        }
    }

    public function cek_lokasi($id_transaksi)
    {
        $query = Lokasi::where('id_transaksi', $id_transaksi);
        $lokasi = $query
            ->select([
                'id_transaksi', 
                'koordinat_lokasi', 
                'alamat_lokasi_tujuan', 
                'keterangan',
                Lokasi::raw('DATE_FORMAT(created_at, "%H:%i") as waktu'),
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        if ($lokasi->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'data' => $lokasi,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Lokasi tidak ditemukan',
            ], 404);
        }
    }

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function delete_transaksi_belum_bayar($id)
    {
        $transaksi = Transaksi::with('lokasi')->find($id);

        if (!$transaksi) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan',
            ], 404);
        }

        // Hapus data terkait di tabel `lokasi`
        foreach ($transaksi->lokasi as $lokasi) {
            $lokasi->delete();
        }

        // Hapus transaksi
        $transaksi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ], 200);
    }

}
