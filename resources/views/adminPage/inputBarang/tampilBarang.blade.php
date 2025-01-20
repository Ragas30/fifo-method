@extends('dashboard.layout')
@section('title', 'Tampil Barang')
@section('content')
    <header class="flex justify-between md:flex-row flex-col md:items-center items-start">
        <h1 class="text-3xl font-bold md:mb-0 mb-4">Data Barang</h1>
        <div>
            <a href="{{ route('print.data.barang') }}"
                class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Simpan Data Barang</a>
            <a href="{{ route('input_barang') }}"
                class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Tambah
                Barang</a>
        </div>
    </header>

    <div class="overflow-x-auto">
        <table class="table-fixed w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama Barang</th>
                    <th class="px-4 py-2">Stok Barang</th>
                    <th class="px-4 py-2">Harga Beli</th>
                    <th class="px-4 py-2">Harga Jual</th>
                    <th class="px-4 py-2">Keterangan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->stok }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_beli }}</td>
                        <td class="border px-4 py-2">{{ $barang->harga_jual }}</td>
                        <td class="border px-4 py-2">{{ $barang->keterangan }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('edit_barang', $barang->id) }}"
                                class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Edit</a>
                            <a href="{{ route('delete_barang', $barang->id) }}"
                                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
