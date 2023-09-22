<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck; // Sesuaikan dengan model yang sesuai

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        Truck::create($validatedData);

        return redirect()->route('trucks.index')
            ->with('success', 'Truck berhasil ditambahkan.');
    }

    public function show(Truck $truck)
    {
        return view('trucks.show', compact('truck'));
    }

    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $validatedData = $request->validate([
            'plat_truck' => 'required',
            'maksimal_beban_truck' => 'required',
        ]);

        $truck->update($validatedData);

        return redirect()->route('trucks.index')
            ->with('success', 'Truck berhasil diperbarui.');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks.index')
            ->with('success', 'Truck berhasil dihapus.');
    }
}
