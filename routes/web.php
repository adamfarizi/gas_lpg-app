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
    Route::get('admin/dashboard', [RoleController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('admin/dashboard', [AdminController::class, 'index_admin_dashboard'])->middleware('userAkses:admin');
    Route::get('admin/dashboard/create', [AdminController::class, 'create_admin_dashboard'])->middleware('userAkses:admin');
    Route::post('admin/dashboard/create', [AdminController::class, 'create_admin_dashboard_action'])->middleware('userAkses:admin')->name('create.action');
    Route::get('admin/dashboard/{id}/edit', [AdminController::class, 'edit_admin_dashboard'])->middleware('userAkses:admin');
    Route::put('admin/dashboard/{id}',[AdminController::class, 'edit_admin_dashboard_action'])->middleware('userAkses:admin');
    Route::delete('admin/dashboard/{id}', [AdminController::class, 'destroy_admin_dashboard'])->middleware('userAkses:admin');
    Route::get('admin/profile', [AdminController::class, 'edit_admin_profile'])->middleware('userAkses:admin')->name('admin_profile');
    Route::put('admin/profile/{id}',[AdminController::class, 'edit_admin_profile_action'])->middleware('userAkses:admin');

    // Role agen
    Route::get('agen/dashboard', [RoleController::class, 'agen'])->middleware('userAkses:agen');
    Route::get('agen/dashboard', [AgenController::class, 'index_agen_dashboard'])->middleware('userAkses:agen');
    Route::get('agen/dashboard/{id}/edit', [AgenController::class, 'edit_agen_dashboard'])->middleware('userAkses:agen');
    Route::put('agen/dashboard/{id}',[AgenController::class, 'update_agen_dashboard'])->middleware('userAkses:agen');
    Route::delete('agen/dashboard/{id}', [AgenController::class, 'destroy_agen_dashboard'])->middleware('userAkses:agen');
    Route::get('agen/profile', [AgenController::class, 'edit_agen_profile'])->middleware('userAkses:agen')->name('agen_profile');
    Route::put('agen/profile/{id}',[AgenController::class, 'edit_agen_profile_action'])->middleware('userAkses:agen');

    // Role kurir
    Route::get('kurir', [RoleController::class, 'kurir'])->middleware('userAkses:kurir');
});

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('admin/dashboard');
        } elseif (Auth::user()->role == 'agen') {
            return redirect('agen/dashboard');
        }
        return redirect('kurir');
    } else {
        return view('home', ['title' => 'Home']);
    }
});
