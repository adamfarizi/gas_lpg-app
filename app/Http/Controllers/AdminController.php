<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Dashboard
    public function index_admin_dashboard(){
        $data['title'] = 'Admin';
    
        $total_user = User::count();
        $total_admin = User::where('role', 'admin')->count();
        $total_agen = User::where('role', 'agen')->count();
        $total_kurir = User::where('role', 'kurir')->count();
        $admins = User::where('role', 'admin')
            ->where('user_id', '!=', auth()->user()->user_id)
            ->get();        
        $agens = User::where('role', 'agen')
            ->get();
        $kurirs = User::where('role', 'kurir')
            ->get();
    
        return view('role.admin.dashboard', [
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'total_agen' => $total_agen,
            'total_kurir' => $total_kurir,
            'admins' => $admins,
            'agens' => $agens,
            'kurirs' => $kurirs,
        ], $data);    
    }

    public function create_admin_dashboard(){
        $data['title'] = 'Admin';

        return view('role.admin.create', $data);
    }

    public function create_admin_dashboard_action(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confrimation' => 'required|same:password',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'agen',
            'password' => Hash::make($request->password), 
        ]);
        $user->save();
        return redirect()->route('home')->with('success', 'Account has been created !');
    }

    public function edit_admin_dashboard($user_id)
    {
        $data['title'] = 'Admin';

        $users = User::find($user_id);
        return view('role.admin.edit', ['users'=>$users], $data);   
    }

    public function edit_admin_dashboard_action($user_id, Request $request)
    {
        $data['title'] = 'Admin';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');    
        $user->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_admin_dashboard($user_id){
        $data['title'] = 'Admin';

        $users = User::find($user_id);
        $users->delete();
        return redirect('admin/dashboard'); 
    }

    public function edit_admin_profile()
    {
        $data['title'] = 'Profile';
        $user = USER::find(Auth::id());
        return view('role.admin.profile', ['users'=>$user], $data);   
    }

    public function edit_admin_profile_action($user_id, Request $request)
    {
        $data['title'] = 'Profile';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');    
        $user->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }
}