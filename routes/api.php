<?php

use App\Http\Controllers\Api\ApiAgenController;
use App\Http\Controllers\Api\ApiKurirController;
use Illuminate\Support\Facades\Route;
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
Route::apiResource('/data/agen', App\Http\Controllers\Api\ApiAgenController::class);
Route::apiResource('/data/kurir', App\Http\Controllers\Api\ApiKurirController::class);

// Agen
Route::post('/agen/login', [ApiAgenController::class, 'login_action']);
Route::get('/agen/{id}',[ApiAgenController::class, 'edit_index']);
Route::put('/agen/update/{id}',[ApiAgenController::class, 'edit_action']);

// Kurir
Route::post('/kurir/login', [ApiKurirController::class, 'login_action']);
Route::get('/kurir/{id}',[ApiKurirController::class, 'edit_index']);
Route::put('/kurir/update/{id}',[ApiKurirController::class, 'edit_action']);