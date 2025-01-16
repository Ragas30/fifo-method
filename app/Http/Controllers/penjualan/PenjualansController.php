<?php

namespace App\Http\Controllers\penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualansController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::with('barang')->get();
        return view('adminPage.penjualan.index', compact('barangs', 'penjualans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|min:1|numeric',
            'harga_barang' => 'required|min:1|numeric',
        ]);

        $total_harga = $request->jumlah * $request->harga_barang;

        DB::transaction(function () use ($request, $total_harga) {
            Penjualan::create([
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'total_harga' => $total_harga,
            ]);

            Transaksi::create([
                'barang_id' => $request->barang_id,
                'jenis' => 'keluar',
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_barang,
            ]);
        });

        return redirect()->route('penjualan')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::with('barang')->findOrFail($id);
        $penjualans = Penjualan::with('barang')->get();

        return view('adminPage.penjualan.edit', compact('penjualan', 'penjualans'));
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::findOrFail($id);

        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|min:1|numeric',
            'harga_barang' => 'required|min:1|numeric',
        ]);

        $penjualan->jumlah = $request->jumlah;
        $penjualan->total_harga = $request->jumlah * $request->harga_barang;

        $penjualan->save();

        return redirect()->route('penjualan')->with('success', 'Penjualan berhasil diubah');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();

        return redirect()->route('penjualan')->with('success', 'Penjualan berhasil dihapus');
    }
}

