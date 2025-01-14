<?php

namespace App\Http\Controllers\pimpinan;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class laporanController extends Controller
{
    public function laporan()
    {
        $barangs = Barang::all();
        return view('pimpinan.laporan.index', compact('barangs'));
    }
}
