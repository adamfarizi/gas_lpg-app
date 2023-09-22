<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agen;
use App\Models\Kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // admin
    public function index_admin_user(){
        $data['title'] = 'Admin';

        $total_admin = User::count(); // Menghitung jumlah admin
        $admins = User::where('role', 'admin')
            ->where('id_admin', '!=', auth()->user()->id_admin)
            ->get(); // Mengambil semua data admin dengan role 'admin'
        
        $total_agen = Agen::count();
        $agens = Agen::all();
        
        $total_kurir = Kurir::count();
        $kurirs = Kurir::all();

        $total_user = $total_admin + $total_agen + $total_kurir;
        
        return view('role.admin.user', [
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'total_agen' => $total_agen,
            'total_kurir' => $total_kurir,
            'admins' => $admins,
            'agens' => $agens,
            'kurirs' => $kurirs,
        ], $data); 
    }

    public function create_admin_user(){
        $data['title'] = 'Admin';

        return view('role.admin.create', $data);
    }

    public function create_admin_user_action(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_admin',
            'password' => 'required',
            'password_confrimation' => 'required|same:password',
        ]);
        $admin = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'agen',
            'password' => Hash::make($request->password), 
        ]);
        $admin->save();
        return redirect()->route('admin_admin')->with('success', 'Account has been created !');
    }

    public function edit_admin_user($admin_id)
    {
        $data['title'] = 'Admin';

        $admins = User::find($admin_id);
        return view('role.admin.edit', ['admins'=>$admins], $data);   
    }

    public function edit_admin_user_action($admin_id, Request $request)
    {
        $data['title'] = 'Admin';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $admin = User::find($admin_id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');    
        $admin->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_admin_user($admin_id){
        $data['title'] = 'Admin';

        $admins = User::find($admin_id);
        $admins->delete();
        return redirect('admin/admin'); 
    }

    public function edit_admin_profile()
    {
        $data['title'] = 'Profile';
        $admin = User::find(Auth::id());
        return view('role.admin.profile', ['admins'=>$admin], $data);   
    }

    public function edit_admin_profile_action($admin_id, Request $request)
    {
        $data['title'] = 'Profile';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $admin = User::find($admin_id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');    
        $admin->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }
}