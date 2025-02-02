<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .table td,
        th {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table th {
            background-color: #333;
            color: white;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .h2 {
            text-align: right;
            font-size: 8px;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
        <h1 style="font-weight: bold;">Laporan Data Barang</h1>
    </div>
    <div class="header">
        <h1>CV. Vega Kontruksi Advertising</h1>
        <hr>
        <p>Jl. Adinegoro, Lubuk Buaya, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586 </p>
    </div>
    <h5>Tanggal Cetak {{ $tanggal }}</h5>
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
                <td>{{ $barang->stok }}{{ $barang->satuan }}</td>
                <td>{{ $barang->harga_beli }}</td>
                <td>{{ $barang->harga_jual }}</td>
                <td>{{ $barang->keterangan }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
