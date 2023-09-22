<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agen;
use App\Models\Kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function index() {
        $data['title'] = 'Home';
        
        $adminCount = User::count();
        $agenCount = Agen::count();
        $kurirCount = Kurir::count();

        $totalUser = $adminCount + $agenCount + $kurirCount;

        return view('home',['total_user' => $totalUser,], $data);
    }

    public function register(){
        $data['title'] = 'Register';
        return view('user/register', $data);
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
            'role' => $request->role ?? 'agen',
            'password' => Hash::make($request->password), 
        ]);
        $admin->save();
        return redirect('admin')->with('success', 'Registration Success. Please Login!');
    }


    public function login(){
        $data['title'] = 'Login';
        return view('user/login', $data);
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
                return redirect('admin/dashboard');
            }elseif (Auth::user()->role=='agen') {
                return redirect('agen/dashboard');
            }else {
                return redirect('kurir');
            }
        }else{
            return redirect('login')->withErrors('The email and password entered do not match!')->withInput();
        }
    }

    
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
