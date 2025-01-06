@extends('dashboard.layout')
@section('title', 'Transaksi Barang')
@section('content')
    <div class="flex justify-start items-center border-sm">
        <form action="{{ route('transaksis.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="barang_id" class="block text-sm font-medium text-text-white">Pilih Barang</label>
                <select name="barang_id" id="barang_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    <option value="" disabled selected>Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jenis" class="block text-sm font-medium text-text-white">Jenis Transaksi</label>
                <select name="jenis" id="jenis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    required>
                    <option value="masuk">Barang Masuk</option>
                    <option value="keluar">Barang Keluar</option>
                </select>
            </div>
            <div>
                <label for="jumlah" class="block text-sm font-medium text-text-white">Jumlah Barang</label>
                <input type="number" name="jumlah" id="jumlah"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div id="harga_satuan_field">
                <label for="harga_satuan" class="block text-sm font-medium text-text-white">Harga Satuan</label>
                <input type="number" step="0.01" name="harga_satuan" id="harga_satuan"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="bg-violet-600 text-white px-4 py-2 rounded-md hover:bg-violet-700">
                Submit
            </button>
        </form>
    </div>

    <script>
        document.getElementById('jenis').addEventListener('change', function() {
            const jenis = this.value;
            const hargaSatuanField = document.getElementById('harga_satuan_field');
            if (jenis === 'masuk') {
                hargaSatuanField.style.display = 'block';
            } else {
                hargaSatuanField.style.display = 'none';
            }
        });
    </script>

@endsection
