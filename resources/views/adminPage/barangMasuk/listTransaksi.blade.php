@extends('dashboard.layout')
@section('title', 'Transaksi Barang')
@section('content')
    <div class="flex justify-center items-center border-sm">
        <table>
            <thead></thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Jenis Transaksi</th>
                <th>Tanggal Masuk</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Barang A</td>
                    <td>10</td>
                    <td>Barang Masuk</td>
                    <td>2023-06-01</td>
                </tr>
            </tbody>


        </table>

    </div>
@endsection
