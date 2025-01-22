<?php

namespace App\Http\Controllers\inputBarang;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inputBarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $barangs = Barang::where('nama_barang', 'LIKE', "%{$search}%")
            ->orWhere('stok', 'LIKE', "%{$search}%")
            ->orWhere('harga_beli', 'LIKE', "%{$search}%")
            ->orWhere('harga_jual', 'LIKE', "%{$search}%")
            ->orWhere('satuan', 'LIKE', "%{$search}%")
            ->orWhere('keterangan', 'LIKE', "%{$search}%")
            ->get();

        return view('adminPage.inputBarang.index', compact('barangs', 'search'));
    }

    public function tampil()
    {
        $barangs = Barang::all(); // Menambahkan pengambilan data barang dari database
        return view('adminPage.inputBarang.tampilBarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga_beli' => 'required|min:0',
            'harga_jual' => 'required|min:0',
            'satuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barang = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barang) {
            $barang->stok += $request->stok;
            $barang->save();
        } else {
            Barang::create([
                'nama_barang' => $request->nama_barang,
                'stok' => $request->stok,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'satuan' => $request->satuan,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil ditambahkan.');
    }


    public function destroy(Request $request) //+
    {
        $barangs = Barang::findOrFail($request->id);
        $barangs->delete();
        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil dihapus.');
    }


    public function edit(Request $request) //+
    {
        $barang = Barang::findOrFail($request->id);
        return view('adminPage.inputBarang.edit', compact('barang'));
    }

    public function update(Request $request, $id) //+
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga_beli' => 'required|min:0',
            'harga_jual' => 'required|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil diubah.');
    }
}
