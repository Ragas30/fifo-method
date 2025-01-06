<?php

namespace App\Http\Controllers\inputBarang;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inputBarangController extends Controller
{
    public function index()
    {
        return view('adminPage.inputBarang.index');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        Transaksi::create([
            'barang_id' => $barang->id,
            'jenis' => 'masuk',
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
        ]);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan!');
    }
}
