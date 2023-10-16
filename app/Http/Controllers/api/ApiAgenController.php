<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Http\Resources\PostResource;


class ApiAgenController extends Controller
{   
    public function index(){
        $dateupdate = Agen::all();

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

        $agen = Agen::where('email', $email)->first();

        if (!$agen) {
            return response()->json([
                'success' => false,
                'message' => 'Akun tidak terdaftar!',
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
                'message' => 'Password salah!',
            ], 422);
        }
    }

    public function edit_index(string $id){
        $agen = Agen::where('id_agen', $id)->first();
    
        if (empty($agen)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }
        else{
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditemukan',
                'datauser' => $agen,
            ], 200);
        }
    }
    

    public function edit_action(string $id, Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);
    
        $agen = Agen::find($id);
        if (empty($agen)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $agen->name = $request->input('name');
        $agen->email = $request->input('email');
        $agen->no_hp = $request->input('no_hp');        
        $agen->alamat = $request->input('alamat');
        $agen->koordinat = $request->input('koordinat');
        $agen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $agen,
        ], 200);    
    }

}
