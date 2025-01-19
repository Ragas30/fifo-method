<?php

namespace App\Http\Controllers\laporan;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class laporanBarang extends Controller
{

    public function index()
    {
        $barangs = Barang::all();
        return view('adminPage.laporan.laporanBarang', compact('barangs'));
    }
}
