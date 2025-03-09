<?php

namespace App\Http\Controllers\penjualan;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualansController extends Controller
{
    public function index(Request $request)
    {
        $query = Penjualan::with('barang');

        // Filter berdasarkan tanggal
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter berdasarkan bulan
        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        // Filter berdasarkan tahun
        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        // Ambil data penjualan yang telah difilter
        $penjualans = $query->get();
        $barangs = Barang::all();

        return view('adminPage.penjualan.index', compact('barangs', 'penjualans'));
    }


    public function store(Request $request)
    {
        // Validasi input penjualan
        $request->validate([
            'barang_id'    => 'required|exists:barang,id',
            'jumlah'       => 'required|numeric|min:1',
            'harga_barang' => 'required|numeric|min:1',
        ]);

        $total_harga = $request->jumlah * $request->harga_barang;

        DB::transaction(function () use ($request, $total_harga) {
            $barangId = $request->barang_id;
            $jumlahTerjual = $request->jumlah;

            // Ambil seluruh batch pembelian untuk barang tersebut secara FIFO
            $batches = Pembelian::where('barang_id', $barangId)
                ->where('sisa', '>', 0)
                ->orderBy('created_at', 'asc')
                ->get();

            foreach ($batches as $batch) {
                if ($jumlahTerjual <= 0) {
                    break;
                }

                // Tentukan jumlah yang dapat diambil dari batch ini
                $ambil = min($batch->sisa, $jumlahTerjual);

                // Kurangi stok pada batch pembelian
                $batch->sisa -= $ambil;
                $batch->save();

                // Catat transaksi penjualan (keluar) untuk batch tersebut
                Transaksi::create([
                    'barang_id'    => $barangId,
                    'id_pembelian' => $batch->id,
                    'jenis'        => 'keluar',
                    'jumlah'       => $ambil,
                    'harga_satuan' => $request->harga_barang,
                ]);

                $jumlahTerjual -= $ambil;
            }

            // Jika stok tidak mencukupi dari semua batch, batalkan transaksi
            if ($jumlahTerjual > 0) {
                throw new \Exception("Stok tidak mencukupi untuk penjualan.");
            }

            // Update stok total di tabel barang
            Barang::where('id', $barangId)->decrement('stok', $request->jumlah);

            // Simpan data penjualan secara agregat
            Penjualan::create([
                'barang_id'   => $barangId,
                'jumlah'      => $request->jumlah,
                'total_harga' => $total_harga,
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
            'barang_id'    => 'required|exists:barang,id',
            'jumlah'       => 'required|numeric|min:1',
            'harga_barang' => 'required|numeric|min:1',
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
