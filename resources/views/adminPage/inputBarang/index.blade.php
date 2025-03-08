@extends('dashboard.layout')
@section('title', 'Input Barang')
@section('content')
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold">Table Input Barang</h1>
        <form action="{{ route('post_barang') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-200 p-4 rounded-xl shadow-2xl">
                <div>
                    <label for="kd_barang" class="block text-sm font-medium text-text-white">Kode Barang</label>
                    <input type="text" name="kd_barang" id="kd_barang"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                        value="{{ old('kd_barang') }}">
                    @error('kd_barang')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nama_barang" class="block text-sm font-medium text-text-white">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                        value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stok" class="block text-sm font-medium text-text-white">Stok Barang</label>
                    <input type="number" name="stok" id="stok"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required value="{{ old('stok') }}">
                    @error('stok')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="satuan" class="block text-sm font-medium text-text-white">Satuan</label>
                    <input type="text" name="satuan" id="satuan"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required value="{{ old('satuan') }}">
                    @error('satuan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="harga_beli" class="block text-sm font-medium text-text-white">Harga Beli</label>
                    <input type="number" name="harga_beli" id="harga_beli"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                        value="{{ old('harga_beli') }}">
                    @error('harga_beli')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="harga_jual" class="block text-sm font-medium text-text-white">Harga Jual</label>
                    <input type="number" name="harga_jual" id="harga_jual"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                        value="{{ old('harga_jual') }}">
                    @error('harga_jual')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-text-white">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script>
        // Example of how to initialize a simple toast notification
        const toast = document.querySelector('.toast');
        if (toast) {
            setTimeout(() => toast.classList.add('show'), 3000);
        }

        @if (session('success'))
            alert('Barang berhasil di tambahkan');
        @elseif ($errors->any())
            alert('Error: {{ $errors->first() }}');
        @endif
    </script>
@endsection

