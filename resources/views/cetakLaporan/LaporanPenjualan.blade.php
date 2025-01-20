<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Penjualan</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Laporan Data Penjualan</h1>
    <hr>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($penjualans as $index => $penjualan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $penjualan->barang->nama_barang }}</td>
                <td>{{ $penjualan->jumlah }}</td>
                <td>{{ $penjualan->total_harga / $penjualan->jumlah }}</td>
                <td>{{ $penjualan->total_harga }}</td>
                <td>{{ $penjualan->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
