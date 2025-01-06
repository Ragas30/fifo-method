<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\transaksi\transaksiController;
use App\Http\Controllers\inputBarang\inputBarangController;

route::get('/', [homeController::class, "index"])->name('home');
route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');
route::get('/input_barang', [dashboardController::class, "inputBarang"])->name('input_barang');
route::get('/barangMasuk', [transaksiController::class, "index"])->name('barangMasuk');
Route::post('/transaksis/store', [transaksiController::class, 'store'])->name('transaksis.store');
