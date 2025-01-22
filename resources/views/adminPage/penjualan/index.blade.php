@extends('dashboard.layout')
@section('title', 'Penjualan')
@section('content')
    <header class="flex justify-between md:flex-row flex-col md:items-center items-start">
        <h1 class="text-3xl font-bold md:mb-0 mb-4">Data Penjualan</h1>
        <div>
            <a href="{{ route('print.data.penjualan') }}"
                class="bg-white text-black font-bold px-4 py-2 rounded-md hover:bg-slate-700">Simpan Data Penjualan</a>
        </div>
    </header>
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('penjualan.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    <option disabled selected>Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}" data-harga="{{ $barang->harga_jual }}">
                            {{ $barang->nama_barang }}</option>
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
                    required readonly>
            </div>
            <button type="submit" class="bg-white text-black px-4 py-2 rounded-md hover:bg-slate-700">
                Submit
            </button>
        </form>
    </div>
    <div class="overflow-x-auto mt-4">
        <table class="table-auto w-full sm:w-auto">
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
                @foreach ($penjualans as $index => $penjualan)
                    <tr class="hover:bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $penjualan->barang->nama_barang }}</td>
                        <td class="px-4 py-2">{{ $penjualan->jumlah }}</td>
                        <td class="px-4 py-2">{{ $penjualan->barang->harga_jual }}</td>
                        <td class="px-4 py-2">{{ $penjualan->total_harga }}</td>
                        <td class="px-4 py-2 flex flex-col sm:flex-row gap-2 sm:gap-4 justify-center">
                            <a href="{{ route('penjualan.edit', $penjualan->id) }}"
                                class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700 w-full sm:w-auto">Edit</a>
                            <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 w-full sm:w-auto">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const select = document.querySelector('select[name="barang_id"]');
        const harga = document.querySelector('input[name="harga_barang"]');

        select.addEventListener('change', function() {
            harga.value = select.options[select.selectedIndex].getAttribute('data-harga');
        });
    </script>
@endsection
