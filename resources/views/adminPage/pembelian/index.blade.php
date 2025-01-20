@extends('dashboard.layout')
@section('title', 'Pembelian')
@section('content')
    <header class="flex justify-between md:flex-row flex-col md:items-center items-start">
        <h1 class="text-3xl font-bold md:mb-0 mb-4">Data Pembelian</h1>
        <div>
            <a href="{{ route('print.data.pembelian') }}"
                class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Simpan Data Pembelian</a>
        </div>
    </header>
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('pembelian.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    <option disabled selected>Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Jumlah Barang</label>
                <input type="number" name="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Harga Barang</label>
                <input type="number" name="harga_barang" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <div class="mt-4">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-center">No</th>
                        <th class="px-4 py-2 text-center">Nama Barang</th>
                        <th class="px-4 py-2 text-center">Jumlah Barang</th>
                        <th class="px-4 py-2 text-center">Harga Barang</th>
                        <th class="px-4 py-2 text-center">Total Harga</th>
                        <th class="px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pembelians as $index => $pembelian)
                        <tr class="hover:bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $pembelian->barang->nama_barang }}</td>
                            <td class="px-4 py-2">{{ $pembelian->jumlah }}</td>
                            <td class="px-4 py-2">{{ $pembelian->total_harga / $pembelian->jumlah }}</td>
                            <td class="px-4 py-2">{{ $pembelian->total_harga }}</td>
                            <td class="px-4 py-2 flex justify-center gap-2">
                                <a href="{{ route('pembelian.edit', $pembelian->id) }}"
                                    class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Edit</a>
                                <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
