<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DownloadPDFController extends Controller
{
    public function barang()
    {
        $barangs = Barang::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanBarang', compact('barangs'));
        return $pdf->download('print_barang.pdf');
    }

    public function transaksi()
    {
        $transaksis = Transaksi::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanTransaksi', compact('transaksis'));
        return $pdf->download('print_transaksi.pdf');
    }

    public function pembelian()
    {
        $pembelians = Pembelian::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanPembelian', compact('pembelians'));
        return $pdf->download('print_pembelian.pdf');
    }

    public function penjualan()
    {
        $penjualans = Penjualan::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanPenjualan', compact('penjualans'));
        return $pdf->download('print_penjualan.pdf');
    }
}
