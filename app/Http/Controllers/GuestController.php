<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function register(){
        $data['title'] = 'Register';
        return view('guest.user.register', $data);
    }

    public function register_action(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admin',
            'password' => 'required',
            'password_confrimation' => 'required|same:password',
        ]);
        $admin = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'admin',
            'password' => Hash::make($request->password), 
        ]);
        $admin->save();
        return redirect('login')->with('success', 'Registration Success. Please Login!');
    }


    public function login(){
        $data['title'] = 'Login';
        return view('guest.user.login', $data);
    }

    public function login_action(Request $request)
    {
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
                $request->session()->regenerate();
                
                return redirect('admin/dashboard');
            }else {
                return redirect('login')->with('danger', 'Anda bukan admin!');
            }
        }else{
            return redirect('login')->withErrors('The email and password entered do not match!')->withInput();
        }
    }

    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
