<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang</title>
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
    <h1>Laporan Data Barang</h1>
    <hr>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($barangs as $index => $barang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->harga_beli }}</td>
                <td>{{ $barang->harga_jual }}</td>
                <td>{{ $barang->keterangan }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>

