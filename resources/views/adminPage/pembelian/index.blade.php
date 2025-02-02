@extends('dashboard.layout')
@section('title', 'Pembelian')
@section('content')
    <header class="flex justify-between md:flex-row flex-col md:items-center items-start">
        <h1 class="text-3xl font-bold md:mb-0 mb-4">Data Pembelian</h1>
        <div>
            <a href="{{ route('print.data.pembelian') }}"
                class="bg-white text-black px-4 py-2 rounded-md hover:bg-slate-700">Simpan Data Pembelian</a>
        </div>
    </header>
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('pembelian.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required onchange="getHargaBarang(this)">
                    <option disabled selected>Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}" data-harga="{{ $barang->harga_beli }}">{{ $barang->nama_barang }}</option>
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
                <input type="number" name="harga_barang" id="harga_barang" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required readonly>
            </div>
            <button type="submit" class="bg-white text-black font-bold px-4 py-2 rounded-md hover:bg-slate-700">
                Submit
            </button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <div class="mt-4">
            <div class="overflow-x-auto">
                <table class="table-auto w-full sm:table">
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
                                <td class="px-4 py-2 flex justify-center gap-2 sm:w-auto w-full">
                                    <a href="{{ route('pembelian.edit', $pembelian->id) }}"
                                        class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">Edit</a>
                                    <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 w-full sm:w-auto">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    function getHargaBarang(select) {
        const hargaBarang = select.options[select.selectedIndex].getAttribute('data-harga');
        document.getElementById('harga_barang').value = hargaBarang;
    }
</script>

