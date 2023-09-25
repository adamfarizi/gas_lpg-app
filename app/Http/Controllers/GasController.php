<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gas;
use App\Models\Truck;

class GasController extends Controller
{
    public function index_stock()
    {   
        $data['title'] = 'Stock';
        $gasItems = Gas::all();
        $trucks = Truck::all();
        return view('auth.stock.stock', [
        'gasItems'=>$gasItems,
        'trucks'=>$trucks
        ], $data);
    }

    public function create_stock_gas_action(Request $request)
    {
        $request->validate([
            'jenis_gas' => 'required',
            'stock_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);

        $newgas = new Gas([
            'jenis_gas' => $request->jenis_gas,
            'stock_gas' => $request->stock_gas,
            'harga_gas' => $request->harga_gas,
        ]);
        $newgas->save();

        return redirect()->back()
            ->with('success', 'Data Gas berhasil ditambahkan.');
    }

    public function create_truck_action(Request $request)
    {
        $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        $newgas = new Truck([
            'plat_truck' => $request->plat_truck,
            'maksimal_beban_truck' => $request->maksimal_beban_truck,
        ]);
        $newgas->save();

        return redirect()->back()
            ->with('success', 'Data Gas berhasil ditambahkan.');
    }

    public function destroy_stock_gas($id_gas){
        $data['title'] = 'Stock';

        $gasItems = Gas::find($id_gas);
        $gasItems->delete();
        return back(); 
    }
}
