<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gas;

class GasController extends Controller
{
    public function index()
    {
        $gasItems = Gas::all();
        return view('gas.index', compact('gasItems'));
    }

    public function create()
    {
        return view('gas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'jenis_gas' => 'required',
            'stock_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);

        Gas::create($validatedData);

        return redirect()->route('gas.index')
            ->with('success', 'Data Gas berhasil ditambahkan.');
    }

    public function show(Gas $gas)
    {
        return view('gas.show', compact('gas'));
    }

    public function edit(Gas $gas)
    {
        return view('gas.edit', compact('gas'));
    }

    public function update(Request $request, Gas $gas)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'jenis_gas' => 'required',
            'stock_gas' => 'required',
            'harga_gas' => 'required|numeric',
        ]);

        $gas->update($validatedData);

        return back()
            ->with('success', 'Data Gas berhasil diperbarui.');
    }

    public function destroy(Gas $gas)
    {
        $gas->delete();

        return back()
            ->with('success', 'Data Gas berhasil dihapus.');
    }
}
