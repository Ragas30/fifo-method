@extends('dashboard.layout')
@section('title', 'Transaksi Barang')
@section('content')
    <div class="flex justify-center items-center border-sm">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Jumlah Barang</th>
                    <th class="px-4 py-2">Jenis Transaksi</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td class="px-4 py-2 border-t">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border-t">{{ $transaksi->barang->nama_barang }}</td>
                        <td class="px-4 py-2 border-t">{{ $transaksi->jumlah }}</td>
                        <td class="px-4 py-2 border-t">{{ $transaksi->jenis }}</td>
                        <td class="px-4 py-2 border-t">{{ $transaksi->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
