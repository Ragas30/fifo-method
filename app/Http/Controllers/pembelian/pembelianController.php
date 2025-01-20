<?php

namespace App\Http\Controllers\pembelian;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $pembelians = Pembelian::with('barang')->get();
        return view('adminPage.pembelian.index', compact('barangs', 'pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|min:1|numeric',
            'harga_barang' => 'required|min:1|numeric',
        ]);

        $total_harga = $request->jumlah * $request->harga_barang;

        DB::transaction(function () use ($request, $total_harga) {
            Barang::where('id', $request->barang_id)->increment('stok', $request->jumlah);

            Pembelian::create([
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'total_harga' => $total_harga,
            ]);

            Transaksi::create([
                'barang_id' => $request->barang_id,
                'jenis' => 'masuk',
                'jumlah' => $request->jumlah,
                'harga_satuan' => $request->harga_barang,
            ]);
        });

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembelian = Pembelian::with('barang')->findOrFail($id);
        $pembelians = Pembelian::with('barang')->get();

        return view('adminPage.pembelian.edit', compact('pembelian', 'pembelians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|min:1|numeric',
            'harga_barang' => 'required|min:1|numeric',
        ]);

        $pembelian->jumlah = $request->jumlah;
        $pembelian->total_harga = $request->jumlah * $request->harga_barang;

        $pembelian->save();

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil dihapus');
    }
}
