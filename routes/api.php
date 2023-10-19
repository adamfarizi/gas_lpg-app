<?php

use App\Http\Controllers\Api\ApiAgenController;
use App\Http\Controllers\Api\ApiKurirController;
use App\Http\Controllers\Api\ApiTransaksiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public Route
Route::post('/agen/login', [ApiAgenController::class, 'login_action']);
Route::post('/kurir/login', [ApiKurirController::class, 'login_action']);

// Protected Route Agen
Route::middleware(['auth:sanctum', 'check.agen'])->group(function () {
    Route::apiResource('/data/agen', App\Http\Controllers\Api\ApiAgenController::class);
    Route::post('/agen/logout', [ApiAgenController::class, 'logout_action']);
    Route::post('/agen/transaksi/create', [ApiTransaksiController::class, 'create_transaksi']);
    Route::get('/agen/transaksi/belum_bayar', [ApiTransaksiController::class, 'transaksi_belum_bayar']);
    Route::get('/agen/transaksi/proses', [ApiTransaksiController::class, 'transaksi_proses']);
    Route::get('/agen/transaksi/dikirim', [ApiTransaksiController::class, 'transaksi_dikirim']);
    Route::get('/agen/transaksi/diterima', [ApiTransaksiController::class, 'transaksi_diterima']);
    Route::get('/agen/{id}',[ApiAgenController::class, 'edit_index']);
    Route::put('/agen/update/{id}',[ApiAgenController::class, 'edit_action']);
    Route::put('/agen/update/name/{id}',[ApiAgenController::class, 'edit_name']);
    Route::put('/agen/update/email/{id}',[ApiAgenController::class, 'edit_email']);
    Route::put('/agen/update/no_hp/{id}',[ApiAgenController::class, 'edit_no_hp']);
    Route::put('/agen/update/alamat/{id}',[ApiAgenController::class, 'edit_alamat']);
    Route::put('/agen/update/password/{id}',[ApiAgenController::class, 'edit_password']);

});

// Protected Route Kurir
Route::middleware(['auth:sanctum', 'check.kurir'])->group(function () {
    Route::apiResource('/data/kurir', App\Http\Controllers\Api\ApiKurirController::class);
    Route::get('/kurir/{id}',[ApiKurirController::class, 'edit_index']);
    Route::put('/kurir/update/{id}',[ApiKurirController::class, 'edit_action']);

});


