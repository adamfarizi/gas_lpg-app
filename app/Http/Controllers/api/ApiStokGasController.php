<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gas;
use App\Http\Resources\PostResource;
use Illuminate\Validation\ValidationException;

class ApiStokGasController extends Controller
{
    public function index($id_gas = null){
        if ($id_gas) {
            $gas = Gas::find($id_gas);

            if (!$gas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data gas tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data gas berhasil diambil',
                'data' => $gas,
            ], 200);
        } else {
            $stokGas = Gas::all();

            if ($stokGas->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data gas tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data gas berhasil diambil',
                'data' => $stokGas,
            ], 200);
        }
    }
    public function show($id){
        $gas = Gas::find($id);

        if (!$gas) {
            return response()->json([
                'success' => false,
                'message' => 'Data gas tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data gas berhasil diambil',
            'data' => $gas,
        ], 200);
    }


}
