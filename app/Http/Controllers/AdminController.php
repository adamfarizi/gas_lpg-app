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

}
