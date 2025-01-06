@extends('layout.header')
@section('title', 'Home')
@section('content')


    <main
        class="flex flex-row items-center justify-center h-screen bg-gradient-to-r from-violet-900 via-slate-800 to-black px-4 md:px-10 lg:px-20 xl:px-40">

        <div class="grid grid-cols-1 justify-start md:grid-cols-2 gap-4 md:gap-8 lg:gap-12 p-4 md:p-0">
            <div class="flex flex-col items-start justify-center text-white">
                <h1 class="text-4xl font-bold md:text-8xl lg:text-10xl">Selamat Datang Di</h1>
                <h2 class="text-xl font-bold md:text-6xl lg:text-8xl">CV.Vega Kontruksi</h2>
                <p class="mt-2 md:mt-6 lg:mt-12">

                    Sistem Penunjang Keputusan (Topsis) adalah sebuah sistem yang digunakan untuk membantu
                    pengambilan keputusan dalam memilih alternatif terbaik. <br class="">
                    <hr class="w-full">
                    untuk detail lebih lanjut silahkan klik tombol di bawah
                </p>
                <a href=""
                    class="mt-2 md:mt-12 px-6 py-2 rounded-md bg-white text-black hover:bg-violet-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">
                    Baca Selengkapnya
                </a>
            </div>


            <div class=" md:flex items-center justify-center">
                <div id="background"
                    class="animate-bounce bg-white w-1/2 md:w-3/4 lg:w-1/2 h-1/2 md:h-3/4 lg:h-1/2 rounded-full">
                    {{-- <img src="https://ragas30.github.io/foto/ragas.jpeg" alt="" class="w-full h-full object-cover rounded-full"> --}}
                </div>

            </div>
        </div>
    </main>

    <div
        class="flex flex-row items-center justify-center h-screen bg-gradient-to-r from-violet-900 via-slate-900 to-black px-4 md:px-10 lg:px-20 xl:px-40">
        <div class="flex flex-col items-start justify-center text-white">
            <p class="text-xl font-bold md:text-8xl lg:text-10xl">About</p>
            <h1 class="text-6xl font-bold md:text-6xl lg:text-8xl">TOPSIS</h1>
            <p class="mt-2 md:mt-6 lg:mt-12">
                Topsis adalah sebuah sistem penunjang keputusan yang digunakan untuk membantu pengambilan keputusan
                dalam memilih alternatif terbaik.

                Topsis menggunakan kriteria untuk mengukur kemiripan antara alternatif yang dipilih dengan
                alternatif lainnya. <br class="">

                Topsis juga menggunakan bobot untuk mengukur bobot dari setiap kriteria.
            </p>
            <a href="">Mulai</a>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const background = document.getElementById('background');

            background.addEventListener('mouseenter', function() {
                background.classList.add('animate-bounce');

            });
        });
    </script>

@endsection
