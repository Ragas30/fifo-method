<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\registerController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\pimpinan\laporanController;
use App\Http\Controllers\pimpinan\pimpinanController;
use App\Http\Controllers\transaksi\transaksiController;
use App\Http\Controllers\penjualan\PenjualansController;
use App\Http\Controllers\inputBarang\inputBarangController;
use App\Http\Controllers\transaksi\listTransaksiController;

Route::middleware('guest')->group(function () {
    Route::get('/', [homeController::class, "index"])->name('home');
    //home

    //register
    Route::get('/register', [registerController::class, 'showregistrationform'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('registerPost');

    //login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('loginPost');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');

    //Table Barang
    Route::get('/input_barang', [dashboardController::class, "inputBarang"])->name('input_barang');
    Route::post('/input_barang', [inputBarangController::class, "store"])->name('input_barang');
    Route::get('/tampil_barang', [inputBarangController::class, "tampil"])->name('tampil_barang');
    Route::get('/delete_barang/{id}', [inputBarangController::class, "destroy"])->name('delete_barang');
    Route::get('/edit_barang/{id}', [inputBarangController::class, "edit"])->name('edit_barang');
    Route::put('/update_barang/{id}', [inputBarangController::class, "update"])->name('update_barang');

    //barang masuk/keluar
    Route::get('/transaksi', [transaksiController::class, "index"])->name('transaksi');
    Route::post('/transaksi', [transaksiController::class, "store"])->name('transaksiPost');
    Route::get('/list_transaksi', [listTransaksiController::class, "index"])->name('listTransaksi');

    // Route Penjualan
    Route::get('/penjualan', [PenjualansController::class, "index"])->name('penjualan');
    Route::post('/penjualan', [PenjualansController::class, "store"])->name('penjualan.store');
    Route::get('/penjualan/{id}/edit', [PenjualansController::class, "edit"])->name('penjualan.edit');
    Route::put('/penjualan/{id}', [PenjualansController::class, "update"])->name('penjualan.update');
    Route::delete('/penjualan/{id}', [PenjualansController::class, "destroy"])->name('penjualan.destroy');

    //pimpinan
    Route::get('/pimpinan_page', [pimpinanController::class, "index"])->name('pimpinan_page');
    Route::get('/laporan_pimpinan', [laporanController::class, "laporan"])->name('laporan_pimpinan');
});
