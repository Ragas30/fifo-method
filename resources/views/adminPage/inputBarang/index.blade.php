@extends('dashboard.layout')
@section('title', 'Input Barang')
@section('content')
    <div class="container mx-auto py-10">
        <form action="{{ route('input_barang') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-text-white">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-text-white">Stok Barang</label>
                    <input type="number" name="stok" id="stok"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-medium text-text-white">Satuan</label>
                    <input type="text" name="satuan" id="satuan"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="harga_beli" class="block text-sm font-medium text-text-white">Harga Beli</label>
                    <input type="text" name="harga_beli" id="harga_beli"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="harga_jual" class="block text-sm font-medium text-text-white">Harga Jual</label>
                    <input type="text" name="harga_jual" id="harga_jual"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-text-white">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

