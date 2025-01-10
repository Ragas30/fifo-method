<?php

namespace App\Http\Controllers\transaksi;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class transaksiController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('adminPage.barangMasuk.index', compact('barangs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'nullable|numeric|min:0',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($request->jenis === 'masuk') {
            $barang->stok += $request->jumlah;
            Transaksi::create([
                'barang_id' => $barang->id,
                'jenis' => 'masuk',
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_satuan,
            ]);
        } else {
            if ($barang->stok < $request->jumlah) {
                return back()->withErrors(['msg' => 'Stok tidak mencukupi!']);
            }

            $barang->stok -= $request->jumlah;
            Transaksi::create([
                'barang_id' => $barang->id,
                'jenis' => 'keluar',
                'jumlah' => $request->jumlah,
            ]);
        }

        $barang->save();

        return redirect()->route('tampil_barang')->with('success', 'Transaksi berhasil dicatat!');
    }
}
