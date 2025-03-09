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
    public function index(Request $request)
    {
        $barangs = Barang::all();
        
        // Ambil filter dari request
        $tanggal = $request->query('tanggal');
        $bulan = $request->query('bulan');
        $tahun = $request->query('tahun');

        // Query dasar
        $query = Pembelian::with('barang');

        if ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }
        if ($bulan) {
            $query->whereMonth('created_at', $bulan);
        }
        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $pembelians = $query->get();

        return view('adminPage.pembelian.index', compact('barangs', 'pembelians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'    => 'required|exists:barang,id',
            'jumlah'       => 'required|numeric|min:1',
            'harga_barang' => 'required|numeric|min:1',
        ]);

        $total_harga = $request->jumlah * $request->harga_barang;

        DB::transaction(function () use ($request, $total_harga) {
            // Tambah stok barang di tabel barang
            Barang::where('id', $request->barang_id)->increment('stok', $request->jumlah);

            // Simpan pembelian sebagai batch baru,
            // dengan field "sisa" diisi default sama dengan jumlah pembelian.
            Pembelian::create([
                'barang_id'   => $request->barang_id,
                'jumlah'      => $request->jumlah,
                'total_harga' => $total_harga,
                'sisa'        => $request->jumlah, // default: sisa sama dengan jumlah pembelian
            ]);

            // Catat transaksi pembelian (masuk)
            Transaksi::create([
                'barang_id'    => $request->barang_id,
                'jenis'        => 'masuk',
                'jumlah'       => $request->jumlah,
                'harga_satuan' => $request->harga_barang,
            ]);
        });

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembelian = Pembelian::with('barang')->findOrFail($id);
        $pembelians = Pembelian::with('barang')->get();
        return view('adminPage.pembelian.edit', compact('pembelian', 'pembelians'));
    }

    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $request->validate([
            'barang_id'    => 'required|exists:barang,id',
            'jumlah'       => 'required|numeric|min:1',
            'harga_barang' => 'required|numeric|min:1',
        ]);

        // Perbarui record pembelian.
        $pembelian->jumlah = $request->jumlah;
        $pembelian->total_harga = $request->jumlah * $request->harga_barang;
        $pembelian->sisa = $request->jumlah; // set ulang sisa menjadi jumlah pembelian baru

        $pembelian->save();

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil diubah');
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian')->with('success', 'Pembelian berhasil dihapus');
    }
}
