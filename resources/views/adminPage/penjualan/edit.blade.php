@extends('dashboard.layout')
@section('title', 'Penjualan')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Nama Barang</label>
                <input type="hidden" name="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $penjualan->barang->id }}" required>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $penjualan->barang->nama_barang }}">
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Jumlah Barang</label>
                <input type="number" name="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $penjualan->jumlah }}" required>
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Harga Barang</label>
                <input type="number" name="harga_barang" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $penjualan->total_harga / $penjualan->jumlah }}" required>
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>
    <table>
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <tr>
                @foreach ($penjualans as $index => $penjualan)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penjualan->barang->nama_barang }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->total_harga / $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->total_harga }}</td>
                    <td>
                        <a href="{{ route('penjualan.edit', $penjualan->id) }}">Edit</a>
                        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Hapus</button>
                        </form>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
