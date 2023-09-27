<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gas;
use App\Models\Truck;

class StockController extends Controller
{
    public function index_stock()
    {   
        $data['title'] = 'Stock';

        $gasItems = Gas::all();
        $total_gas = Gas::sum('stock_gas');

        $trucks = Truck::all();
        $total_truck = Truck::count();

        return view('auth.stock.stock', [
        'gasItems' => $gasItems,
        'total_gas' => $total_gas,
        'trucks' => $trucks,
        'total_truck' => $total_truck,
        ], $data);
    }

    public function create_gas_action(Request $request)
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

    public function edit_stock_gas($id_gas)
    {
        $data['title'] = 'Stock';
        
        $gas = Gas::find($id_gas);
        return view('auth.stock.edit.gas_edit', ['gas'=>$gas], $data);   
    }

    public function edit_stock_gas_action($id_gas, Request $request)
    {
        $data['title'] = 'Stock';

        $request->validate([
            'jenis_gas' => 'required',
            'stock_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);
    
        $gas = Gas::find($id_gas);
        $gas->jenis_gas = $request->input('jenis_gas');
        $gas->stock_gas = $request->input('stock_gas');    
        $gas->harga_gas = $request->input('harga_gas');    
        $gas->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_stock_gas($id_gas){
        $data['title'] = 'Stock';

        $gasItems = Gas::find($id_gas);
        $gasItems->delete();
        return back(); 
    }

    public function create_truck_action(Request $request)
    {
        $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        $newtruck = new Truck([
            'plat_truck' => $request->plat_truck,
            'maksimal_beban_truck' => $request->maksimal_beban_truck,
        ]);
        $newtruck->save();

        return redirect()->back()
            ->with('success', 'Data Gas berhasil ditambahkan.');
    }

    public function edit_stock_truck($id_truck)
    {
        $data['title'] = 'Stock';
        
        $truck = Truck::find($id_truck);
        return view('auth.stock.edit.truck_edit', ['truck'=>$truck], $data);   
    }

    public function edit_stock_truck_action($id_truck, Request $request)
    {
        $data['title'] = 'Stock';

        $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);
    
        $truck = Truck::find($id_truck);
        $truck->plat_truck = $request->input('plat_truck');
        $truck->maksimal_beban_truck = $request->input('maksimal_beban_truck');
        $truck->save();

        return redirect()->back()->with('success', 'Change successfuly !');
    }

    public function destroy_stock_truck($id_truck){
        $data['title'] = 'Stock';

        $truckItems = Truck::find($id_truck);
        $truckItems->delete();
        return back(); 
    }
}