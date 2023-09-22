<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    public function edit_agen_user($id_agen)
    {
        $data['title'] = 'Agen';
        
        $agens = Agen::find($id_agen);
        return view('role.admin.edit', ['agens'=>$agens], $data);   
    }

    public function edit_agen_user_action($agen_id, Request $request)
    {
        $data['title'] = 'Agen';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $agen = Agen::find($agen_id);
        $agen->name = $request->input('name');
        $agen->email = $request->input('email');    
        $agen->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_agen_user($agen_id){
        $data['title'] = 'Agen';

        $agens = Agen::find($agen_id);
        $agens->delete();
        return redirect('agen/agen'); 
    }

}
