<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{   
    public function edit_kurir_user($id_kurir)
    {
        $data['title'] = 'Kurir';
        
        $kurirs = Kurir::find($id_kurir);
        return view('auth.user.edit.kurir_edit', ['kurirs'=>$kurirs], $data);   
    }

    public function edit_kurir_user_action($id_kurir, Request $request)
    {
        $data['title'] = 'Kurir';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
        ]);
    
        $kurir = Kurir::find($id_kurir);
        $kurir->name = $request->input('name');
        $kurir->email = $request->input('email');    
        $kurir->no_hp = $request->input('no_hp');    
        $kurir->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function update_status_kurir($id){
        $kurir = Kurir::find($id);

        if(!$kurir){
            return redirect()->back()->with('error','Kurir tidak ditemukan!');
        }

        $kurir->status = 'tersedia';
        $kurir->save();

        return redirect()->back()->with('success','Status kurir diubah!');
    }

    public function destroy_kurir_user($kurir_id){
        $data['title'] = 'Kurir';

        $kurirs = Kurir::find($kurir_id);
        $kurirs->delete();
        return back(); 
    }

}
