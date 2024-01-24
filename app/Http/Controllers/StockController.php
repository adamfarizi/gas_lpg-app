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
        $total_gas_isi = Gas::where('jenis_gas', 'Isi Ulang')->sum('stock_gas');
        $total_gas_baru = Gas::where('jenis_gas', 'Gas Baru')->sum('stock_gas');

        $trucks = Truck::all();
        $total_truck = Truck::count();

        return view('auth.stock.stock', [
        'gasItems' => $gasItems,
        'total_gas_isi' => $total_gas_isi,
        'total_gas_baru' => $total_gas_baru,
        'trucks' => $trucks,
        'total_truck' => $total_truck,
        ], $data);
    }

    public function create_gas_action(Request $request)
    {
        $request->validate([
            'name_gas' => 'required',
            'berat_gas' => 'required|numeric',
            'stock_gas' => 'required|numeric',
            'jenis_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);

        $newgas = new Gas([
            'name_gas' => $request->name_gas,
            'berat_gas' => $request->berat_gas,
            'stock_gas' => $request->stock_gas,
            'jenis_gas' => $request->jenis_gas,
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
            'name_gas' => 'required',
            'berat_gas' => 'required|numeric',
            'stock_gas' => 'required|numeric',
            'jenis_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);
    
        $gas = Gas::find($id_gas);
        $gas->name_gas = $request->input('name_gas'); 
        $gas->berat_gas = $request->input('berat_gas');    
        $gas->stock_gas = $request->input('stock_gas');    
        $gas->jenis_gas = $request->input('jenis_gas');
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
    
    public function update_status_truck($id){
        $truck = Truck::find($id);

        if(!$truck){
            return redirect()->back()->with('error','Truck tidak ditemukan!');
        }

        $truck->status = 'tersedia';
        $truck->save();

        return redirect()->back()->with('success','Status truck diubah!');
    }
}
