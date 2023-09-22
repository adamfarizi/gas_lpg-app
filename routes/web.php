<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\GuestController;

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
    Route::get('about', function () {return view('about', ['title' => 'About']);})->name('about');
    Route::get('login', [GuestController::class, 'login'])->name('login');
    Route::post('login', [GuestController::class, 'login_action'])->name('login.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [GuestController::class, 'logout'])->name('logout');

    //Controller user
    Route::get('admin/dashboard', [RoleController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('admin/user', [UserController::class, 'index_admin_user'])->middleware('userAkses:admin')->name('admin_user');
    Route::get('admin/user/create', [UserController::class, 'create_admin_user'])->middleware('userAkses:admin');
    Route::post('admin/user/create', [UserController::class, 'create_admin_user_action'])->middleware('userAkses:admin')->name('create.action');
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');

    // Controller admin
    Route::get('admin/user/admin/{id}/edit', [AdminController::class, 'edit_admin_user'])->middleware('userAkses:admin');
    Route::put('admin/user/admin/{id}',[AdminController::class, 'edit_admin_user_action'])->middleware('userAkses:admin');
    Route::delete('admin/user/admin/{id}', [AdminController::class, 'destroy_admin_user'])->middleware('userAkses:admin');
    Route::get('admin/profile', [AdminController::class, 'edit_admin_profile'])->middleware('userAkses:admin')->name('admin_profile');
    Route::put('admin/profile/{id}',[AdminController::class, 'edit_admin_profile_action'])->middleware('userAkses:admin');

    // Controller agen
    Route::get('admin/user/agen/{id}/edit', [AgenController::class, 'edit_agen_user'])->middleware('userAkses:admin');
    Route::put('admin/user/agen/{id}',[AgenController::class, 'edit_agen_user_action'])->middleware('userAkses:admin');
    Route::delete('admin/user/agen/{id}', [AgenController::class, 'destroy_agen_user'])->middleware('userAkses:admin');

    // Controller kurir
    Route::get('admin/user/kurir/{id}/edit', [KurirController::class, 'edit_kurir_user'])->middleware('userAkses:admin');
    Route::put('admin/user/kurir/{id}',[KurirController::class, 'edit_kurir_user_action'])->middleware('userAkses:admin');
    Route::delete('admin/user/kurir/{id}', [KurirController::class, 'destroy_kurir_user'])->middleware('userAkses:admin');
});

Route::get('register', [GuestController::class, 'register'])->name('register');
Route::post('register', [GuestController::class, 'register_action'])->name('register.action');

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('admin/dashboard');
        } elseif (Auth::user()->role == 'agen') {
            return redirect('agen/dashboard');
        }
        return redirect('kurir');
    } else {
        return redirect('/');
    }
});
