@extends('dashboard.layout')
@section('title', 'Pembelian')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Nama Barang</label>
                <input type="hidden" name="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $pembelian->barang->id }}" required>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $pembelian->barang->nama_barang }}">
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Jumlah Barang</label>
                <input type="number" name="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $pembelian->jumlah }}" required>
            </div>
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Harga Barang</label>
                <input type="number" name="harga_barang" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ $pembelian->total_harga / $pembelian->jumlah }}" required>
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
                @foreach ($pembelians as $index => $pembelian)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembelian->barang->nama_barang }}</td>
                    <td>{{ $pembelian->jumlah }}</td>
                    <td>{{ $pembelian->total_harga / $pembelian->jumlah }}</td>
                    <td>{{ $pembelian->total_harga }}</td>
                    <td>
                        <a href="{{ route('pembelian.edit', $pembelian->id) }}">Edit</a>
                        <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST">
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
