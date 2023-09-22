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
        return view('role.admin.edit', ['kurirs'=>$kurirs], $data);   
    }

    public function edit_kurir_user_action($kurir_id, Request $request)
    {
        $data['title'] = 'Kurir';

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $kurir = Kurir::find($kurir_id);
        $kurir->name = $request->input('name');
        $kurir->email = $request->input('email');    
        $kurir->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_kurir_user($kurir_id){
        $data['title'] = 'Kurir';

        $kurirs = Kurir::find($kurir_id);
        $kurirs->delete();
        return redirect('kurir/kurir'); 
    }

}
