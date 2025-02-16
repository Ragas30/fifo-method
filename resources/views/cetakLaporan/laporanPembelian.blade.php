<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pembelian</title>
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
    </style>
</head>

<body>

    <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
        <h1 style="font-weight: bold;">Laporan Pembelian</h1>
    </div>
    <div class="header">
        <h1>CV. Vega Kontruksi Advertising</h1>
        <hr>
        <p>Jl. Adinegoro, Lubuk Buaya, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586 </p>
    </div>
    <h5 style="margin-top: 20px">Tanggal Cetak {{ $tanggal }}</h5>
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
        @foreach ($pembelians as $index => $pembelian)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pembelian->barang->nama_barang }}</td>
                <td>{{ $pembelian->jumlah }} {{ $pembelian->barang->satuan }}</td>
                <td>{{ $pembelian->total_harga / $pembelian->jumlah }}</td>
                <td>{{ $pembelian->total_harga }}</td>
                <td>{{ $pembelian->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
