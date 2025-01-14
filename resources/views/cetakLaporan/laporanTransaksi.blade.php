<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table td, th {
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
    <h1>Laporan Transaksi</h1>
    <hr>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jenis Transaksi</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->barang->nama_barang }}</td>
                <td>{{ $transaksi->jenis }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
