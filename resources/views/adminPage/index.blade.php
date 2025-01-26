@extends('dashboard.layout')
@section('title', 'Admin Page')
@section('content')
    <header class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-serif font-bold">Dashboard {{ auth()->user()->level }}</h1>
    </header>

    @if (auth()->user()->level === 'admin')
        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-cursive font-semibold mb-2">Produk</h2>
                <p class="text-gray-600">Total Barang: <span class="font-serif">{{ $barangs }}</span></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-fantasy font-semibold mb-2">Barang Masuk</h2>
                <p class="text-gray-600">Total Barang Masuk : <span class="font-serif">{{ $pembelians }}</span> </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-fantasy font-semibold mb-2">Barang Keluar</h2>
                <p class="text-gray-600">Total Barang Keluar : <span class="font-serif">{{ $penjualans }}</span></p>
            </div>
        </div>
    @else
        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-sans font-semibold mb-2">Users</h2>
                <p class="text-gray-600">Total User: <span class="font-monospace">{{ $users->count() }}</span></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-cursive font-semibold mb-2">Products</h2>
                <p class="text-gray-600">Total Barang: <span class="font-serif">{{ $barangs }}</span></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-fantasy font-semibold mb-2">Transaksi</h2>
                <p class="text-gray-600">Total Transaksi: <span class="font-serif">{{ $transaksis }}</span></p>
            </div>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
        <h2 class="text-xl font-semibold mb-4">Grafik Data Barang</h2>
        <canvas id="chartBarang" width="400" height="200"></canvas>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg mt-8">
        <h2 class="text-xl font-semibold mb-4">Grafik Data Transaksi</h2>
        <canvas id="chartTransaksi" width="400" height="200"></canvas>
    </div>

    <script>
        // Grafik Data Barang
        const ctxBarang = document.getElementById('chartBarang').getContext('2d');
        const chartBarang = new Chart(ctxBarang, {
            type: 'bar',
            data: {
                labels: ['Produk', 'Barang Masuk', 'Barang Keluar'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $barangs }}, {{ $pembelians }}, {{ $penjualans }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Grafik Data Transaksi
        const ctxTransaksi = document.getElementById('chartTransaksi').getContext('2d');
        const chartTransaksi = new Chart(ctxTransaksi, {
            type: 'pie',
            data: {
                labels: ['Transaksi Barang Masuk', 'Transaksi Barang Keluar'],
                datasets: [{
                    label: 'Jumlah Transaksi',
                    data: [{{ $pembelians }}, {{ $penjualans }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
@endsection

