<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgenController;


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
    Route::get('/', function () {return view('home', ['title' => 'Home']);})->name('home');
    Route::get('about', function () {return view('about', ['title' => 'About']);})->name('about');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'login_action'])->name('login.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('password', [UserController::class, 'password'])->name('password');
    Route::post('password', [UserController::class, 'password_action'])->name('password.action');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    // Role admin
    Route::get('admin', [RoleController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('admin', [AdminController::class, 'index_dashboard'])->middleware('userAkses:admin');
    Route::get('admin/create', [AdminController::class, 'create_dashboard'])->middleware('userAkses:admin');
    Route::post('admin/create', [AdminController::class, 'create_dashboard_action'])->middleware('userAkses:admin')->name('create.action');
    Route::get('admin/{id}/edit', [AdminController::class, 'edit_dashboard'])->middleware('userAkses:admin');
    Route::put('admin/{id}',[AdminController::class, 'edit_dashboard_action'])->middleware('userAkses:admin');
    Route::delete('admin/{id}', [AdminController::class, 'destroy_dashboard'])->middleware('userAkses:admin');
    Route::get('profile', [AdminController::class, 'edit_profile'])->middleware('userAkses:admin')->name('profile');
    Route::put('profile',[AdminController::class, 'edit_profile_action'])->middleware('userAkses:admin');

    // Role agen
    Route::get('agen', [RoleController::class, 'agen'])->middleware('userAkses:agen');
    Route::get('agen', [AgenController::class, 'index_agen'])->middleware('userAkses:agen');
    Route::get('agen/{id}/edit', [AgenController::class, 'edit_agen'])->middleware('userAkses:agen');
    Route::put('agen/{id}',[AgenController::class, 'update_agen'])->middleware('userAkses:agen');
    Route::delete('agen/{id}', [AgenController::class, 'destroy'])->middleware('userAkses:agen');

    // Role kurir
    Route::get('kurir', [RoleController::class, 'kurir'])->middleware('userAkses:kurir');
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('admin');
        } elseif (Auth::user()->role == 'agen') {
            return redirect('agen');
        }
        return redirect('kurir');
    } else {
        return view('home', ['title' => 'Home']);
    }
});
