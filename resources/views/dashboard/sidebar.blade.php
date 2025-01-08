<button id="hamburger" class="md:hidden flex flex-col items-start justify-start mt-5 ml-2 gap-1" aria-label="menu"
    onclick="document.getElementById('mobileMenu').classList.toggle('hidden'); this.ariaLabel === 'menu' ? this.ariaLabel = 'close menu' : this.ariaLabel = 'menu'">
    <span class="block w-6 h-1 bg-white"></span>
    <span class="block w-6 h-1 bg-white"></span>
    <span class="block w-6 h-1 bg-white"></span>
</button>

<aside id="mobileMenu" class="hidden md:block w-[200px] bg-violet-700 p-4 justify-between">
    <nav class="space-y-1 flex flex-col justify-between h-full">
        <div>
            <a href="{{ route('dashboard') }}"
                class="block py-2 px-4 rounded-md text-white hover:bg-violet-600">Dashboard</a>
            <a href="{{ route('input_barang') }}"
                class="block py-2 px-4 rounded-md text-white hover:bg-violet-600">Input
                Barang</a>
            <a href="{{ route('barangMasuk') }}"
                class="block py-2 px-4 rounded-md text-white hover:bg-violet-600">Barang Masuk</a>
        </div>
        <a href="" class="block py-2 px-4 rounded-md text-white hover:bg-violet-600">logout</a>
    </nav>
</aside>
