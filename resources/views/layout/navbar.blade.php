<nav class="bg-transparent border-gray-200 px-2 sm:px-4 py-5 z-50 fixed top-0 w-full">
    <div class="flex items-center justify-between">

        <div class="flex items-center gap-2">
            <a href="{{ route('home') }}" class="font-bold text-3xl text-white">CV. Vega Kontruksi Advertising</a>
        </div>


        <div class="hidden md:flex items-center gap-2 text-bold text-white">
            <a href="" class="hover:text-violet-300">About</a>
            <a href="" class="hover:text-violet-300">Service</a>
        </div>

        <div class="hidden md:flex items-center gap-2 font-bold">
            <a href="{{ route('login') }}"
                class="block py-2 px-4 rounded-md text-white hover:bg-violet-600">Dashboard</a>

        </div>


        <button id="hamburger" class="md:hidden flex flex-col items-center justify-center gap-1">
            <span class="block w-6 h-1 bg-white"></span>
            <span class="block w-6 h-1 bg-white"></span>
            <span class="block w-6 h-1 bg-white"></span>
        </button>
    </div>


    <div id="mobileMenu" class="hidden  flex-col gap-2 mt-4 md:hidden text-center text-white">
        <a href="" class="block py-2 px-4 hover:bg-violet-600">About</a>
        <a href="" class="block py-2 px-4 hover:bg-violet-600">Service</a>
        <a href="{{ route('login') }}" class="block py-2 px-4 hover:bg-violet-600">Dashboard</a>

    </div>
</nav>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('nav');
        if (window.scrollY > 0) {
            navbar.classList.add('bg-violet-600');
        } else {
            navbar.classList.remove('bg-violet-600');
        }
    });
</script>
