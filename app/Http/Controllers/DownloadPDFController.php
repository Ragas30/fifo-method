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
        $tanggal = date('d-m-Y');
        $barangs = Barang::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanBarang', compact('barangs', 'tanggal'));
        return $pdf->download('print_barang.pdf');
    }

    public function transaksi()
    {
        $tanggal = date('d-m-Y');
        $transaksis = Transaksi::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanTransaksi', compact('transaksis', 'tanggal'));
        return $pdf->download('print_transaksi.pdf');
    }

    public function pembelian()
    {
        $tanggal = date('d-m-Y');
        $pembelians = Pembelian::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanPembelian', compact('pembelians', 'tanggal'));
        return $pdf->download('print_pembelian.pdf');
    }

    public function penjualan()
    {
        $tanggal = date('d-m-Y');
        $penjualans = Penjualan::all();
        $pdf = Pdf::loadView('cetakLaporan.laporanPenjualan', compact('penjualans', 'tanggal'));
        return $pdf->download('print_penjualan.pdf');
    }
}
