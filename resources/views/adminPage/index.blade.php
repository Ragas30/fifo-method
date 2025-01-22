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

@endsection
