@extends('layout.header')
@section('title', 'Home')
@section('content')
    <main
        class="flex flex-col items-center justify-center h-screen bg-gradient-to-r pt-10 from-green-900 via-slate-800 to-black px-4 md:px-10 lg:px-20 xl:px-40">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 lg:gap-12 p-8 md:p-0">
            <div class="flex flex-col items-start justify-center text-white">
                <h1 class="text-4xl md:text-6xl lg:text-8xl font-bold">Selamat Datang Di</h1>
                <h2 class="text-xl md:text-4xl lg:text-6xl font-bold">CV.Vega Kontruksi Advertising</h2>
                <p class="mt-4 md:mt-6 lg:mt-8">
                    Kami Menerima berbagai pesanan atas pembuatan dan pemasangan:
                <ul class="list-disc pl-4">
                    <li>ACP (Alumunium Composite Panel)</li>
                    <li>Kontruksi Baja Berat</li>
                    <li>Pemasangan Baja Ringan</li>
                    <li>Dan Masih Banyak lagi</li>
                </ul>
                <hr class="w-full my-4">
                Untuk detail lebih lanjut silahkan klik tombol di bawah
                </p>
                <a href="https://wa.me/6281261736929"
                    class="mt-4 px-6 py-2 rounded-md bg-white text-black hover:bg-violet-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">
                    Hubungi Kami
                </a>
            </div>

            <div class="flex items-center justify-center mt-8 md:mt-0">
                <div id="background"
                    class="bg-white w-48 h-48 md:w-64 md:h-64 lg:w-72 lg:h-72 rounded-full overflow-hidden">
                    {{-- <img src="https://ragas30.github.io/foto/ragas.jpeg" alt="" class="w-full h-full object-cover rounded-full"> --}}
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
