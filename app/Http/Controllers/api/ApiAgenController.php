<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class ApiAgenController extends Controller
{   
    public function index(){
        $dateupdate = Agen::all();

        if($dateupdate){
            return new PostResource(true, 'Get Berhasil', $dateupdate);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function register_action(Request $request) {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);

            $existingEmail = Agen::where('email', $request->input('email'))->first();
            if ($existingEmail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email sudah terdaftar.',
                ], 422);
            }
            else{
            $admin = new Agen([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => 'agen',
                'password' => Hash::make($request->input('password')), 
            ]);
            $admin->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil didaftarkan!',
                'datauser' => $admin,
            ], 200);
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

        $token = $agen->createToken('myappToken')->plainTextToken;
        // Verifikasi password
        if (password_verify($password, $agen->password)) {
            return response()->json([
                'success' => true,
                'token' => $token,
                'datauser' => $agen,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Password salah!',
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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'alamat' => 'required|string|max:255',
                'koordinat' => 'required|string|max:255',
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

    public function edit_name(string $id, Request $request){
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
    
        $agen = Agen::find($id);
        if (empty($agen)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $agen->name = $request->input('name');
        $agen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $agen,
        ], 200);   
    }

    public function edit_email(string $id, Request $request) {
        try {
            $request->validate([
                'email' => 'required|email|max:255',
            ]);
    
            // Check if the new email already exists
            $existingEmail = Agen::where('email', $request->input('email'))->first();
            if ($existingEmail) {
                if ($existingEmail['id_agen']== $id) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Anda tidak melakukan perubahan email.',
                    ], 422);
                }
                else{
                return response()->json([
                    'success' => false,
                    'message' => 'Email sudah terdaftar.',
                ], 422);
            }
            }
    
            $agen = Agen::find($id);
            if (empty($agen)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan!',
                ], 422);
            }
    
            $agen->email = $request->input('email');
            $agen->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah',
                'datauser' => $agen,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }
    }
    

    public function edit_no_hp(string $id, Request $request){
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
    
        $agen = Agen::find($id);
        if (empty($agen)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $agen->no_hp = $request->input('no_hp');
        $agen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $agen,
        ], 200);   
    }

    public function edit_alamat(string $id, Request $request){
        try {
            $request->validate([
                'alamat' => 'required|string|max:255',
                'koordinat' => 'required|string|max:255',
            ]);
        
            // Lanjutkan dengan operasi lain jika validasi berhasil
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->validator->errors()->all(),
            ], 422);
        }
    
        $agen = Agen::find($id);
        if (empty($agen)) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 422);
        }

        $agen->alamat = $request->input('alamat');
        $agen->koordinat = $request->input('koordinat');
        $agen->save();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diubah',
            'datauser' => $agen,
        ], 200);   
    }

    public function edit_password(string $id, Request $request){
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
        $passwordInDatabase = Agen::where('id_agen', $id)->pluck('password')->first();

        if (Hash::check($old_password, $passwordInDatabase)) {
            $new_password = $request->input('new_password');
            $new_password_confirmation = $request->input('new_password_confirmation');

            if ($new_password == $new_password_confirmation) {
                $agen = Agen::find($id);
                $agen->password = Hash::make($new_password); // Menghash password baru
                $agen->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Password berhasil diubah!',
                    'datauser' => $agen,
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
}
