@extends('dashboardPimpinan.layout')
@section('title', 'Halaman Pimpinan')
@section('content')
    <header class="flex justify-between">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </header>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-2xl font-bold">Users</h2>
            <p class="mt-2">Total User Terdaftar: {{ $users }}</p>
        </div>
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-2xl font-bold">Products</h2>
            <p class="mt-2">Total Barang: {{ $barangs }}</p>
        </div>
        <div class="bg-white p-4 rounded-md shadow-md">
            <h2 class="text-2xl font-bold">Orders</h2>
            <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
@endsection
