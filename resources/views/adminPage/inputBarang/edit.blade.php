@extends('dashboard.layout')
@section('title', 'Edit Barang')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('update_barang', $barang->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_barang" class="block text-sm font-medium text-text-white">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                    value="{{ old('nama_barang', $barang->nama_barang) }}">
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-text-white">Stok Barang</label>
                <input type="number" name="stok" id="stok"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                    value="{{ old('stok', $barang->stok) }}">
            </div>
            <div>
                <label for="harga_beli" class="block text-sm font-medium text-text-white">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                    value="{{ old('harga_beli', $barang->harga_beli) }}">
            </div>
            <div>
                <label for="harga_jual" class="block text-sm font-medium text-text-white">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                    value="{{ old('harga_jual', $barang->harga_beli) }}">
            </div>
            <div>
                <label for="keterangan" class="block text-sm font-medium text-text-white">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ old('keterangan', $barang->keterangan) }}">
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>
@endsection
