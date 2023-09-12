<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data['title'] = 'Admin';

        $users = User::all();
        return view('role/admin', ['users'=>$users], $data);
    }

}
