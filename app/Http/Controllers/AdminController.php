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

        // $user = User::find($user_id);
        // $user->update($request->except(['_token', 'role', 'submit']));
        // return redirect('admin')->with(['users' => $user, 'data' => $data]);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update properti lain sesuai kebutuhan
    
        $user->save();

        return redirect('admin');
    }

    public function destroy($user_id){
        $data['title'] = 'Admin';

        $users = User::find($user_id);
        $users->delete();
        return redirect('admin'); 
    }
}