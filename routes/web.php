<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\CreateBuyController;
use App\Http\Controllers\CreateLokasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [GuestController::class, 'login']);
    Route::get('/home', function () {return redirect('login');});
    Route::get('login', [GuestController::class, 'login'])->name('login');
    Route::post('login', [GuestController::class, 'login_action'])->name('login.action');
    Route::get('register', [GuestController::class, 'register'])->name('register');
    Route::post('register', [GuestController::class, 'register_action'])->name('register.action');
});



Route::middleware(['auth'])->group(function () {    
    Route::get('logout', [GuestController::class, 'logout'])->name('logout');

    // Controller dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::get('admin/dashboard/realtimeData', [DashboardController::class, 'realtimeData']);
    Route::get('admin/dashboard/realtimeChart1', [DashboardController::class, 'realTimeChart1']);
    Route::get('admin/dashboard/realtimeChart2', [DashboardController::class, 'realTimeChart2']);

    // Controller proses
    Route::get('admin/proses', [ProsesController::class, 'index'])->name('admin_proses');
    Route::get('admin/proses/realtimeData', [ProsesController::class, 'realtimeData']);
    Route::post('admin/proses/update_pembayaran',[ProsesController::class, 'update_pembayaran'])->name('update_pembayaran');
    Route::put('admin/proses/update_dikirim/{id}',[ProsesController::class, 'update_dikirim'])->name('update_dikirim');

    Route::post('admin/proses/buy', [CreateBuyController::class, 'createData'])->name('buy');
    Route::post('admin/proses/lokasi', [CreateLokasiController::class, 'createLocation'])->name('lokasi');
    
    // Controller user
    Route::get('admin/user', [UserController::class, 'index_user'])->name('admin_user');
    Route::post('admin/user/create', [UserController::class, 'create_user_action'])->name('create.action');
    
    // Controller admin
    Route::get('admin/user/admin/{id}/edit', [AdminController::class, 'edit_admin_user']);
    Route::put('admin/user/admin/{id}',[AdminController::class, 'edit_admin_user_action']);
    Route::delete('admin/user/admin/{id}', [AdminController::class, 'destroy_admin_user']);
    Route::get('admin/profile', [AdminController::class, 'edit_admin_profile'])->name('admin_profile');
    Route::put('admin/profile/{id}',[AdminController::class, 'edit_admin_profile_action']);
    Route::post('password', [AdminController::class, 'password_action'])->name('password.action');
    
    // Controller agen
    Route::get('admin/user/agen/{id}/edit', [AgenController::class, 'edit_agen_user']);
    Route::put('admin/user/agen/{id}',[AgenController::class, 'edit_agen_user_action']);
    Route::delete('admin/user/agen/{id}', [AgenController::class, 'destroy_agen_user']);

    // Controller kurir
    Route::get('admin/user/kurir/{id}/edit', [KurirController::class, 'edit_kurir_user']);
    Route::put('admin/user/kurir/{id}',[KurirController::class, 'edit_kurir_user_action']);
    Route::put('admin/user/kurir/status/{id}',[KurirController::class, 'update_status_kurir']);
    Route::delete('admin/user/kurir/{id}', [KurirController::class, 'destroy_kurir_user']);
    
    //Controller stock
    Route::get('admin/stock', [StockController::class, 'index_stock']);
    Route::post('admin/stock/gas/create', [StockController::class, 'create_gas_action'])->name('create.gas.action');
    Route::get('admin/stock/gas/{id}/edit',[StockController::class, 'edit_stock_gas']);
    Route::put('admin/stock/gas/{id}',[StockController::class, 'edit_stock_gas_action']);
    Route::delete('admin/stock/gas/{id}', [StockController::class, 'destroy_stock_gas']);
    Route::post('admin/stock/truck/create', [StockController::class, 'create_truck_action'])->name('create.truck.action');
    Route::get('admin/stock/truck/{id}/edit',[StockController::class, 'edit_stock_truck']);
    Route::put('admin/stock/truck/{id}',[StockController::class, 'edit_stock_truck_action']);
    Route::delete('admin/stock/truck/{id}', [StockController::class, 'destroy_stock_truck']);
    Route::put('admin/user/truck/status/{id}',[StockController::class, 'update_status_truck']);

});
