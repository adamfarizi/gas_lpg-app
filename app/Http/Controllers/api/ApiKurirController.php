<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kurir;
use App\Models\Lokasi;
use App\Models\Transaksi;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ApiKurirController extends Controller
{
    public function index()
    {
        $dateupdate = Kurir::all();

        if ($dateupdate) {
            return new PostResource(true, 'Get Berhasil', $dateupdate);
        } else {
            return response()->json("Not Found 404");
        }
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $kurir = Kurir::where('email', $email)->first();

        if (!$kurir) {
            return response()->json([
                'success' => false,
                'message' => 'Akun Tidak terdaftar',
            ], 422);
        }

        $token = $kurir->createToken('myappToken')->plainTextToken;
        // Verifikasi password
        if (password_verify($password, $kurir->password)) {
            return response()->json([
                'success' => true,
                'token' => $token,
                'datauser' => $kurir,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Password Salah',
            ], 422);
        }
    }

    public function logout_action(Request $request)
    {
        $user = $request->user();

        // Membuang token pengguna saat ini
        $user->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Anda telah berhasil logout.',
        ], 200);
    }

    public function edit_index(string $id)
    {
        $kurir = Kurir::where('id_kurir', $id)->first();

        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'datauser' => $kurir,
            ], 200);
        }
    }

    public function edit_action(string $id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'no_hp' => 'required|string|max:15',
            ]);

            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }

        $kurir = Kurir::find($id);
        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $kurir->name = $request->input('name');
        $kurir->email = $request->input('email');
        $kurir->no_hp = $request->input('no_hp');
        $kurir->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $kurir,
        ], 200);
    }

    public function edit_name(string $id, Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }

        $kurir = Kurir::find($id);
        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $kurir->name = $request->input('name');
        $kurir->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $kurir,
        ], 200);
    }

    public function edit_email(string $id, Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|max:255',
            ]);

            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }

        $kurir = Kurir::find($id);
        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $kurir->email = $request->input('email');
        $kurir->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $kurir,
        ], 200);
    }

    public function edit_no_hp(string $id, Request $request)
    {
        try {
            $request->validate([
                'no_hp' => 'required|string|max:15',
            ]);

            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }

        $kurir = Kurir::find($id);
        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $kurir->no_hp = $request->input('no_hp');
        $kurir->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $kurir,
        ], 200);
    }

    public function edit_password(string $id, Request $request)
    {
        try {
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required',
                'new_password_confirmation' => 'required',
            ]);

            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }

        $old_password = $request->input('old_password');
        $passwordInDatabase = Kurir::where('id_kurir', $id)->pluck('password')->first();

        if (Hash::check($old_password, $passwordInDatabase)) {
            $new_password = $request->input('new_password');
            $new_password_confirmation = $request->input('new_password_confirmation');

            if ($new_password == $new_password_confirmation) {
                $kurir = Kurir::find($id);
                $kurir->password = Hash::make($new_password); // Menghash password baru
                $kurir->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Password berhasil diubah!',
                    'datauser' => $kurir,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Konfirmasi password tidak cocok!',
                ], 422);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Password lama tidak cocok!',
            ], 422);
        }
    }

    public function createLocation(Request $request)
    {
        // Validasi input sesuai kebutuhan Anda
        $request->validate([
            'id_transaksi' => 'required|array',
            'alamat_lokasi_tujuan' => 'required|string',
            'koordinat_lokasi' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        // Ambil data dari request
        $idTransaksi = $request->input('id_transaksi');
        $alamatLokasiTujuan = $request->input('alamat_lokasi_tujuan');
        $koordinatLokasi = $request->input('koordinat_lokasi');
        $keterangan = $request->input('keterangan');

        // Inisialisasi array untuk data yang akan disisipkan
        $dataToInsert = [];

        foreach ($idTransaksi as $id) {
            Lokasi::create([
                'alamat_lokasi_tujuan' => $alamatLokasiTujuan,
                'id_transaksi' => $id,
                'keterangan' => $keterangan,
                'koordinat_lokasi' => $koordinatLokasi
            ]);
        }

        return response()->json(['message' => 'lokasi berhasil ditambahkan'], 200);
    }

}
