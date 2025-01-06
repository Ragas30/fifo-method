@extends('dashboard.layout')
@section('title', 'Input Barang')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-text-white">Nama Barang</label>
                <input type="text" name="nama" id="nama"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="stok" class="block text-sm font-medium text-text-white">Stok Barang</label>
                <input type="number" name="stok" id="stok"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>
@endsection
