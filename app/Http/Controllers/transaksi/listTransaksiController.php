<?php

namespace App\Http\Controllers\transaksi;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class listTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')->get();
        // dd($transaksis);
        return view('adminPage.barangMasuk.listTransaksi', compact('transaksis'));
    }
}
