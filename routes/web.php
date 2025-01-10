<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\transaksi\transaksiController;
use App\Http\Controllers\inputBarang\inputBarangController;

//home
route::get('/', [homeController::class, "index"])->name('home');

//register
route::get('/register', [registerController::class, 'showregistrationform'])->name('register');
route::post('/register', [RegisterController::class, 'register'])->name('registerPost');

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard
route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');

//Table Barang
route::get('/input_barang', [dashboardController::class, "inputBarang"])->name('input_barang');
route::post('/input_barang', [inputBarangController::class, "store"])->name('input_barang');
route::get('/tampil_barang', [inputBarangController::class, "tampil"])->name('tampil_barang');
route::get('/delete_barang/{id}', [inputBarangController::class, "destroy"])->name('delete_barang');
route::get('/edit_barang/{id}', [inputBarangController::class, "edit"])->name('edit_barang');
route::put('/update_barang/{id}', [inputBarangController::class, "update"])->name('update_barang');

//barang masuk/keluar
route::get('/transaksi', [transaksiController::class, "index"])->name('transaksi');
