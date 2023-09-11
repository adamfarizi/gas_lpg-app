<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(){
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    public function register_action(Request $request){
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
        return redirect()->route('login')->with('success', 'Registration Success. Please Login!');
    }


    public function login(){
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    public function login_action(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            if(Auth::user()->role=='admin'){
                return redirect('admin');
            }elseif (Auth::user()->role=='agen') {
                return redirect('agen');
            }else {
                return redirect('kurir');
            }
        }else{
            return redirect('login')->withErrors('The email and password entered do not match!')->withInput();
        }
    }

    public function password(){
        $data['title'] = 'Change Password';
        return view('password', $data);
    }

    public function password_action(Request $request){
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = USER::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password change success!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

}