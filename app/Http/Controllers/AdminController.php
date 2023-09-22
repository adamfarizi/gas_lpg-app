<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function edit_admin_user($id_admin)
    {
        $data['title'] = 'Admin';
        
        $admins = User::find($id_admin);
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