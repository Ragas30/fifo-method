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
    public function index()
    {
        $barangs = Barang::all();
        $pembelians = Pembelian::with('barang')->get();
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
        // Catatan: Update nilai sisa harus dilakukan dengan hati-hati,
        // terutama jika sudah ada transaksi penjualan terkait batch ini.
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

    /**
     * Contoh fungsi sell (penjualan) dengan metode FIFO.
     * Fungsi ini dapat digunakan jika penjualan diproses di sini.
     * Jika penjualan diproses di controller lain (misalnya, PenjualansController),
     * fungsi ini bisa dihapus.
     */
    public function sell(Request $request)
    {
        $request->validate([
            'barang_id'  => 'required|exists:barang,id',
            'jumlah'     => 'required|numeric|min:1',
            'harga_jual' => 'required|numeric|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $barangId = $request->barang_id;
            $jumlahTerjual = $request->jumlah;

            // Ambil batch pembelian untuk barang tersebut yang memiliki sisa (> 0) secara FIFO
            $batches = Pembelian::where('barang_id', $barangId)
                ->where('sisa', '>', 0)
                ->orderBy('created_at', 'asc')
                ->get();

            foreach ($batches as $batch) {
                if ($jumlahTerjual <= 0) {
                    break;
                }
                // Ambil jumlah maksimal yang bisa diambil dari batch ini
                $ambil = min($batch->sisa, $jumlahTerjual);

                // Kurangi sisa stok pada batch
                $batch->sisa -= $ambil;
                $batch->save();

                // Catat transaksi penjualan (keluar) per batch
                Transaksi::create([
                    'barang_id'    => $barangId,
                    'id_pembelian' => $batch->id,
                    'jenis'        => 'keluar',
                    'jumlah'       => $ambil,
                    'harga_satuan' => $request->harga_jual,
                ]);

                $jumlahTerjual -= $ambil;
            }

            if ($jumlahTerjual > 0) {
                throw new \Exception("Stok tidak mencukupi untuk penjualan.");
            }

            // Update stok total di tabel barang
            Barang::where('id', $barangId)->decrement('stok', $request->jumlah);
        });

        return redirect()->back()->with('success', 'Penjualan berhasil diproses dengan metode FIFO.');
    }
}
