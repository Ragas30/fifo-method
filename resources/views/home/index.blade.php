@extends('layout.header')
@section('title', 'Home')
@section('content')
    <main
        class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-r from-green-900 via-slate-800 to-black px-4">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center p-10 mt-10">
            <div class="text-white space-y-6">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Selamat Datang Di
                </h1>
                <h2 class="text-lg sm:text-xl md:text-3xl lg:text-4xl font-bold">
                    CV.Vega Kontruksi Advertising
                </h2>
                <p class="mt-4 text-sm sm:text-base lg:text-lg leading-relaxed">
                    Kami Menerima berbagai pesanan atas pembuatan dan pemasangan:
                </p>
                <ul class="list-disc pl-5 space-y-2 text-sm sm:text-base lg:text-lg">
                    <li>ACP (Alumunium Composite Panel)</li>
                    <li>Kontruksi Baja Berat</li>
                    <li>Pemasangan Baja Ringan</li>
                    <li>Dan Masih Banyak lagi</li>
                </ul>
                <hr class="border-gray-500 my-4">
                <p class="text-sm sm:text-base lg:text-lg">
                    Untuk detail lebih lanjut silahkan klik tombol di bawah:
                </p>
                <a href="https://wa.me/6281261736929"
                    class="inline-block px-6 py-3 rounded-md bg-white text-black hover:bg-violet-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900 transition">
                    Hubungi Kami
                </a>
            </div>

            <div class="flex items-center justify-center">
                <div id="background"
                    class="bg-white w-40 h-40 sm:w-56 sm:h-56 md:w-64 md:h-64 lg:w-72 lg:h-72 rounded-full overflow-hidden shadow-lg">
                    {{-- <img src="https://ragas30.github.io/foto/ragas.jpeg" alt="Gambar" class="w-full h-full object-cover"> --}}
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const background = document.getElementById('background');

            background.addEventListener('mouseenter', function() {
                background.classList.add('animate-bounce');
            });

            background.addEventListener('mouseleave', function() {
                background.classList.remove('animate-bounce');
            });
        });
    </script>
@endsection
