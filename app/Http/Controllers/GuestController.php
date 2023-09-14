<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $data['title'] = 'Home';
        
        $total_user = User::count();
        
        return view('home',[
            'total_user' => $total_user,
        ], $data);

    }
}
