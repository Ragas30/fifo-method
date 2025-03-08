@extends('dashboard.layout')
@section('title', 'Tampil Barang')
@section('content')
    <header class="flex justify-between md:flex-row flex-col md:items-center items-start">
        <h1 class="text-3xl font-bold md:mb-0 mb-4">Data Barangs</h1>
        <div>
            <a href="{{ route('print.data.barang') }}"
                class="bg-purple-600 text-black font-bold px-4 py-2 rounded-md hover:bg-slate-400">Simpan Data Barang</a>
            @if (auth()->user()->level !== 'pimpinan')
                <a href="{{ route('input_barang') }}"
                    class="bg-purple-600 text-black font-bold px-4 py-2 rounded-md hover:bg-slate-400">Tambah
                    Barang</a>
            @endif
        </div>
    </header>

    <form action="{{ route('get_barang') }}" method="GET">
        <div class="flex items-center gap-2">
            <input type="text" name="search" class="px-4 py-2 rounded-md border" placeholder="Cari Barang"
                value="{{ request()->query('search') }}">
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Cari</button>
        </div>
    </form>
    <div class="overflow-x-auto mt-4">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Kode Barang</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Stok Barang</th>
                    <th class="px-4 py-2">Harga Beli</th>
                    <th class="px-4 py-2">Harga Jual</th>
                    <th class="px-4 py-2">Keterangan</th>
                    @if (auth()->user()->level !== 'pimpinan')
                        <th class="px-4 py-2 md:w-1/6">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $barang->kd_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->stok }} {{ $barang->satuan }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_beli }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_jual }}</td>
                        <td class="border px-4 py-2">{{ $barang->keterangan }}</td>
                        @if (auth()->user()->level !== 'pimpinan')
                            <td class="border px-4 py-2 md:w-1/6">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-center gap-1">
                                    <a href="{{ route('edit_barang', $barang->id) }}"
                                        class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700 w-full md:w-auto">Edit</a>
                                    <a href="{{ route('delete_barang', $barang->id) }}"
                                        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 w-full md:w-auto">Delete</a>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
