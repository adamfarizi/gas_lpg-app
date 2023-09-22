<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agen;
use App\Models\Kurir;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $data['title'] = 'Home';
        
        $adminCount = User::count();
        $agenCount = Agen::count();
        $kurirCount = Kurir::count();

        $totalUser = $adminCount + $agenCount + $kurirCount;

        return view('home',[
            'total_user' => $totalUser,
        ], $data);

    }
}
