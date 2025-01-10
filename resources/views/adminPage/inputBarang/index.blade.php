@extends('dashboard.layout')
@section('title', 'Input Barang')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('input_barang') }}" method="POST" class="space-y-4">
            @csrf
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
                <label for="keterangan" class="block text-sm font-medium text-text-white">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>
@endsection
