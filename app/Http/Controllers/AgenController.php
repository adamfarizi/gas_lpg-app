<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgenController extends Controller
{
    // Dashboard
    public function index_agen(){
        $data['title'] = 'Agen';

        $users = User::where('role', 'kurir')->get();
        return view('role.agen.dashboard', ['users'=>$users], $data);
    }

    public function edit_agen($user_id)
    {
        $data['title'] = 'Agen';

        $users = User::find($user_id);
        return view('role.agen.edit', ['users'=>$users], $data);   
    }

    public function update_agen($user_id, Request $request)
    {
        $data['title'] = 'Agen';

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
        $data['title'] = 'Agen';

        $users = User::find($user_id);
        $users->delete();
        return redirect('agen'); 
    }
}
