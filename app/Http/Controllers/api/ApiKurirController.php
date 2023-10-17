<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Models\Kurir;
use Illuminate\Validation\ValidationException;


class ApiKurirController extends Controller
{
    public function index(){
        $dateupdate = Kurir::all();

        if($dateupdate){
            return new PostResource(true, 'Data Update', $dateupdate);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function login_action(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $agen = Kurir::where('email', $email)->first();

        if (!$agen) {
            return response()->json([
                'success' => false,
                'message' => 'Akun Tidak terdaftar',
            ], 422);
        }

        // Verifikasi password
        if (password_verify($password, $agen->password)) {
            return response()->json([
                'success' => true,
                'datauser' => $agen,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Password Salah',
            ], 422);
        }
    }

    public function edit_index(string $id){
        $kurir = Kurir::where('id_kurir', $id)->first();

        if (empty($kurir)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'datauser' => $kurir,
            ], 200);
        }
    }

    public function edit_action(string $id, Request $request){
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
}
