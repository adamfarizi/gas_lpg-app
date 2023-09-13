<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard
    public function index_dashboard(){
        $data['title'] = 'Admin';

        $users = User::all();
        return view('role.admin.dashboard', ['users'=>$users], $data);
    }

    public function edit_dashboard($user_id)
    {
        $data['title'] = 'Admin';

        $users = User::find($user_id);
        return view('role.admin.edit', ['users'=>$users], $data);   
    }

    public function update_dashboard($user_id, Request $request)
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

    public function destroy($user_id){
        $data['title'] = 'Admin';

        $users = User::find($user_id);
        $users->delete();
        return redirect('admin'); 
    }
}