@extends('dashboard.layout')
@section('title', 'Transaksi Barang')
@section('content')
    <header class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Data Transaksi Barang</h1>
        <a href="{{ route('print.list.transaksi') }}"
            class="bg-purple-600 text-black font-bold px-4 py-2 rounded-md shadow-md hover:bg-slate-700">
            Simpan List Transaksi
        </a>
    </header>

    <form action="{{ route('listTransaksi') }}" method="GET" class="mb-4">
        <div class="flex items-center gap-2">
            <input type="date" name="tanggal" class="px-4 py-2 border rounded-md" placeholder="Pilih Tanggal">
            <select name="bulan" class="px-4 py-2 border rounded-md">
                <option value="">Pilih Bulan</option>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                @endfor
            </select>
            <input type="number" name="tahun" class="px-4 py-2 border rounded-md" placeholder="Tahun">
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Filter</button>
        </div>
    </form>

    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Jumlah Barang</th>
                    <th class="px-4 py-2">Jenis Transaksi</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($transaksis as $transaksi)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $transaksi->barang->nama_barang }}</td>
                        <td class="px-4 py-2">{{ $transaksi->jumlah }} {{ $transaksi->barang->satuan }}</td>
                        <td class="px-4 py-2">{{ $transaksi->jenis }}</td>
                        <td class="px-4 py-2">{{ $transaksi->created_at->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
