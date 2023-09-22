<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\GasController;
use App\Http\Controllers\TruckController;

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
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('stock', function () {return view('stock', ['title' => 'stock']);})->name('stock');
    Route::get('login', [GuestController::class, 'login'])->name('login');
    Route::post('login', [GuestController::class, 'login_action'])->name('login.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [GuestController::class, 'logout'])->name('logout');

    //Controller user
    Route::get('admin/dashboard', [RoleController::class, 'admin']);
    Route::get('admin/user', [UserController::class, 'index_admin_user'])->name('admin_user');
    Route::post('admin/user/create', [UserController::class, 'create_admin_user_action'])->name('create.action');
    
    // Controller admin
    Route::get('admin/user/admin/{id}/edit', [AdminController::class, 'edit_admin_user']);
    Route::put('admin/user/admin/{id}',[AdminController::class, 'edit_admin_user_action']);
    Route::delete('admin/user/admin/{id}', [AdminController::class, 'destroy_admin_user']);
    Route::get('admin/profile', [AdminController::class, 'edit_admin_profile'])->name('admin_profile');
    Route::post('password', [AdminController::class, 'password_action'])->name('password.action');
    
    // Controller agen
    Route::get('admin/user/agen/{id}/edit', [AgenController::class, 'edit_agen_user']);
    Route::put('admin/user/agen/{id}',[AgenController::class, 'edit_agen_user_action']);
    Route::delete('admin/user/agen/{id}', [AgenController::class, 'destroy_agen_user']);

    // Controller kurir
    Route::get('admin/user/kurir/{id}/edit', [KurirController::class, 'edit_kurir_user']);
    Route::put('admin/user/kurir/{id}',[KurirController::class, 'edit_kurir_user_action']);
    Route::delete('admin/user/kurir/{id}', [KurirController::class, 'destroy_kurir_user']);

    //Controller stock
    Route::get('admin/stock', [GasController::class, 'index']);

    //Controller truck
    Route::get('truck', [TruckController::class, 'truck']);
});

Route::get('/home', function () {return redirect('admin/dashboard');});
Route::get('register', [GuestController::class, 'register'])->name('register');
Route::post('register', [GuestController::class, 'register_action'])->name('register.action');
