<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;

class TruckController extends Controller
{
    public function index_stock()
    {   
        $data['title'] = 'Stock';
        
        $trucks = Truck::all();
        return view('auth.stock.stock', ['trucks'=>$trucks], $data);
    }

    public function create()
    {
        return view('truck.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        Truck::create($validatedData);

        return redirect()->route('truck.index')
            ->with('success', 'Data truck berhasil ditambahkan.');
    }

    public function show(Truck $truck)
    {
        return view('truck.show', compact('truck'));
    }

    public function edit(Truck $truck)
    {
        return view('truck.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $validatedData = $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        $truck->update($validatedData);

        return back()
            ->with('success', 'Data truck berhasil diperbarui.');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();

        return back()
            ->with('success', 'Data truck berhasil dihapus.');
    }
}
