<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    function admin(){
        return view('role/admin');
    }
    function agen(){
        return view('role/agen');
    }
    function kurir(){
        return view('role/kurir');
    }
}
