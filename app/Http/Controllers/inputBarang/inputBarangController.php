<?php

namespace App\Http\Controllers\inputBarang;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inputBarangController extends Controller
{
    public function index(Request $request)
    {
        $search  = $request->query('search');
        $tanggal = $request->query('tanggal');
        $bulan   = $request->query('bulan');
        $tahun   = $request->query('tahun');

        $query = Barang::query();

        // Filter berdasarkan pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'LIKE', "%{$search}%")
                    ->orWhere('stok', 'LIKE', "%{$search}%")
                    ->orWhere('harga_beli', 'LIKE', "%{$search}%")
                    ->orWhere('harga_jual', 'LIKE', "%{$search}%")
                    ->orWhere('satuan', 'LIKE', "%{$search}%")
                    ->orWhere('keterangan', 'LIKE', "%{$search}%")
                    ->orWhere('kd_barang', 'LIKE', "%{$search}%");
            });
        }

        // Filter berdasarkan tanggal
        if ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }

        // Filter berdasarkan bulan
        if ($bulan) {
            $query->whereMonth('created_at', $bulan);
        }

        // Filter berdasarkan tahun
        if ($tahun) {
            $query->whereYear('created_at', $tahun);
        }

        $barangs = $query->get();

        return view('adminPage.inputBarang.tampilBarang', compact('barangs', 'search', 'tanggal', 'bulan', 'tahun'));
    }

    public function inputBarang()
    {
        return view('adminPage.inputBarang.index');
    }

    public function tampil()
    {
        $barangs = Barang::all();
        return view('adminPage.inputBarang.tampilBarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_barang'   => 'required|string|max:255|unique:barang',
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|min:0',
            'harga_jual'  => 'required|min:0',
            'satuan'      => 'required|string|max:255',
            'keterangan'  => 'nullable|string|max:255',
        ], [
            'kd_barang.unique' => 'Kode barang sudah ada',
        ]);

        $barang = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barang) {
            $barang->stok += $request->stok;
            $barang->save();
        } else {
            Barang::create($request->all());
        }

        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function destroy(Request $request)
    {
        $barang = Barang::findOrFail($request->id);
        $barang->delete();
        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil dihapus.');
    }

    public function edit(Request $request)
    {
        $barang = Barang::findOrFail($request->id);
        return view('adminPage.inputBarang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok'        => 'required|integer|min:0',
            'harga_beli'  => 'required|min:0',
            'harga_jual'  => 'required|min:0',
            'keterangan'  => 'nullable|string|max:255',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil diubah.');
    }
}
