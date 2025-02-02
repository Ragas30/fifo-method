@extends('dashboard.layout')
@section('tite', 'Laporan Barang')
@section('content')
    <div class="overflow-x-auto">
        <header class="flex justify-center">
            <h1 class="text-3xl font-bold">Laporan Barang</h1>
        </header>
        <table class="table-fixed w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Harga Beli</th>
                    <th class="border px-4 py-2">Harga Jual</th>
                    <th class="border px-4 py-2">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $index => $barang)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->stok }} {{ $barang->satuan }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_beli }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_jual }}</td>
                        <td class="border px-4 py-2">{{ $barang->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
