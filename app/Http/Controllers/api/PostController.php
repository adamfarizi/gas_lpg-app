<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gas;
use App\Models\User;
use App\Http\Resources\PostResource;
use App\Models\Agen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $dateupdate = Gas::all();

        if($dateupdate){
            return new PostResource(true, 'Data Update', $dateupdate);
        }else{
            return response()->json("Not Found 404");
        }

    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->only('email');
        $pass = $request->only('password');

        if($email && $pass){
            $agen = Agen::where('email', $email)->first();

            if ($agen) {
                
                $data_agen = Agen::where('email', $email)->get();
                    return response()->json([
                        'success' => true,
                        'datauser'=> $data_agen,
                    ], 200);
                    
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Akun Tidak terdaftar',
                ], 422);
            }
        }

    }
}