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
        return view('auth.user.edit.agen_edit', ['agens'=>$agens], $data);   
    }

    public function edit_agen_user_action($id_agen, Request $request)
    {
        $data['title'] = 'Agen';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);
    
        $agen = Agen::find($id_agen);
        $agen->name = $request->input('name');
        $agen->email = $request->input('email');
        $agen->no_hp = $request->input('no_hp');        
        $agen->alamat = $request->input('alamat');        
        $agen->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_agen_user($agen_id){
        $data['title'] = 'Agen';

        $agens = Agen::find($agen_id);
        $agens->delete();
        return back(); 
    }

}
