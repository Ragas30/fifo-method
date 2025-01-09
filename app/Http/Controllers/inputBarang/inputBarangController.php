<?php

namespace App\Http\Controllers\inputBarang;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inputBarangController extends Controller
{
    public function index()
    {
        return view('adminPage.inputBarang.index');
    }

    public function tampil()
    {
        $barangs = barang::all(); // Menambahkan pengambilan data barang dari database
        return view('adminPage.inputBarang.tampilBarang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);

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
        $barangs = Barang::findOrFail($request->id);
        return view('adminPage.inputBarang.edit', compact('barangs'));
    }

    public function update(Request $request, $id) //+
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tampil_barang')->with('success', 'Barang berhasil diubah.');
    }
}
