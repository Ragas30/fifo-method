<?php

namespace App\Http\Controllers\transaksi;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class listTransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search  = $request->query('search');
        $tanggal = $request->query('tanggal');

        $query = Transaksi::with('barang');

        if ($search) {
            $query->where('kode_transaksi', 'LIKE', "%{$search}%")
                ->orWhereHas('barang', function ($q) use ($search) {
                    $q->where('nama_barang', 'LIKE', "%{$search}%");
                });
        }

        if ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }

        $transaksis = $query->get();

        return view('adminPage.barangMasuk.listTransaksi', compact('transaksis', 'search', 'tanggal'));
    }
}
