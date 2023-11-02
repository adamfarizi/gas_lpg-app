<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Agen;
use App\Models\Kurir;

class UserController extends Controller
{
    public function index_user(){
        $data['title'] = 'User';

        $total_admin = User::count(); // Menghitung jumlah admin
        $admins = User::where('role', 'admin')
            ->where('id_admin', '!=', auth()->user()->id_admin)
            ->get(); // Mengambil semua data admin dengan role 'admin'
        
        $total_agen = Agen::count();
        $agens = Agen::all();
        
        $total_kurir = Kurir::count();
        $kurirs = Kurir::all();

        $total_user = $total_admin + $total_agen + $total_kurir;
        
        return view('auth.user.user', [
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'total_agen' => $total_agen,
            'total_kurir' => $total_kurir,
            'admins' => $admins,
            'agens' => $agens,
            'kurirs' => $kurirs,
        ], $data); 
    }

    public function create_user_action(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admin|unique:agen|unique:kurir', // Periksa di semua tabel yang sesuai
            'role' => 'required|in:admin,agen,kurir', // Pastikan role hanya salah satu dari admin, agen, atau kurir
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
    
        if ($request->role === 'admin') {
            $userModel = new User([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role ?? 'admin',
                'password' => Hash::make($request->password), 
            ]);
        } elseif ($request->role === 'agen') {
            $userModel = new Agen([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role ?? 'agen',
                'password' => Hash::make($request->password), 
                'alamat' => 'none', 
            ]);
        } elseif ($request->role === 'kurir') {
            $userModel = new Kurir([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role ?? 'kurir',
                'password' => Hash::make($request->password)
            ]);
        } else {
            // Handle jika role tidak valid
            return redirect()->back()->with('error', 'Invalid role selected.');
        }
        
        $userModel->save();
        
        return redirect('admin/user')->with('success', 'Account has been created!');
        
    }
}