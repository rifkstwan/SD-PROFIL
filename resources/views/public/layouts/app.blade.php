<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda') - {{ $profile->name ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 font-sans antialiased">

    {{-- Navbar --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white" id="navbar">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <div class="flex items-center justify-between h-[72px]">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <svg class="w-7 h-7 text-gray-900" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6 2 10.5c0 2.1 1 4 2.6 5.4C3.6 17.2 3 18.5 3 20c0 1.1.9 2 2 2 1.4 0 2.5-.6 3.3-1.5.8.5 1.7.8 2.7 1 .3.1.7.1 1 .1s.7 0 1-.1c1-.2 1.9-.5 2.7-1 .8.9 1.9 1.5 3.3 1.5 1.1 0 2-.9 2-2 0-1.5-.6-2.8-1.6-4.1C21 14.5 22 12.6 22 10.5 22 6 17.52 2 12 2zm-2 14.5c-1.4 0-2.5-.5-3.4-1.3.5-.3 1-.6 1.6-.8.5.4 1.1.6 1.8.6v1.5zm4 0v-1.5c.7 0 1.3-.2 1.8-.6.6.2 1.1.5 1.6.8-.9.8-2 1.3-3.4 1.3zM12 14c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" />
                    </svg>
                    <div class="leading-tight">
                        <span class="block text-[15px] font-bold text-gray-900 tracking-tight">
                            {{ $profile->name ?? config('app.name') }}
                        </span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition {{ request()->routeIs('home') ? 'font-semibold' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('home') }}#tentang"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition">Tentang</a>
                    <a href="{{ route('home') }}#program"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition">Program</a>
                    <a href="{{ route('home') }}#fasilitas"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition">Fasilitas</a>
                    <a href="{{ route('berita.index') }}"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition {{ request()->routeIs('berita.*') ? 'font-semibold' : '' }}">
                        Berita
                    </a>
                    <a href="{{ route('profil.index') }}"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition {{ request()->routeIs('profil.*') ? 'font-semibold' : '' }}">
                        Profil
                    </a>
                    <a href="{{ route('prestasi.index') }}"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition {{ request()->routeIs('prestasi.*') ? 'font-semibold' : '' }}">
                        Prestasi
                    </a>
                    <a href="{{ route('galeri.index') }}"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition {{ request()->routeIs('galeri.*') ? 'font-semibold' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('home') }}#kontak"
                        class="text-[14px] font-medium text-gray-900 hover:text-gray-600 transition">Kontak</a>
                </div>

                {{-- Mobile Toggle --}}
                <button id="mobile-menu-btn" class="lg:hidden p-2 -mr-2 text-gray-900" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 bg-white">
            <div class="px-6 py-4 space-y-1">
                <a href="{{ route('home') }}"
                    class="block py-2 text-[15px] font-medium text-gray-900">Beranda</a>
                <a href="{{ route('home') }}#tentang"
                    class="block py-2 text-[15px] font-medium text-gray-900">Tentang</a>
                <a href="{{ route('home') }}#program"
                    class="block py-2 text-[15px] font-medium text-gray-900">Program</a>
                <a href="{{ route('home') }}#fasilitas"
                    class="block py-2 text-[15px] font-medium text-gray-900">Fasilitas</a>
                <a href="{{ route('berita.index') }}"
                    class="block py-2 text-[15px] font-medium text-gray-900">Berita</a>
                <a href="{{ route('profil.index') }}"
                    class="block py-2 text-[15px] font-medium text-gray-900">Profil</a>
                <a href="{{ route('prestasi.index') }}"
                    class="block py-2 text-[15px] font-medium text-gray-900">Prestasi</a>
                <a href="{{ route('galeri.index') }}"
                    class="block py-2 text-[15px] font-medium text-gray-900">Galeri</a>
                <a href="{{ route('home') }}#kontak"
                    class="block py-2 text-[15px] font-medium text-gray-900">Kontak</a>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="pt-[72px]">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-[#f5f0eb]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">

                {{-- School Info --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <svg class="w-7 h-7 text-gray-900 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6 2 10.5c0 2.1 1 4 2.6 5.4C3.6 17.2 3 18.5 3 20c0 1.1.9 2 2 2 1.4 0 2.5-.6 3.3-1.5.8.5 1.7.8 2.7 1 .3.1.7.1 1 .1s.7 0 1-.1c1-.2 1.9-.5 2.7-1 .8.9 1.9 1.5 3.3 1.5 1.1 0 2-.9 2-2 0-1.5-.6-2.8-1.6-4.1C21 14.5 22 12.6 22 10.5 22 6 17.52 2 12 2zm-2 14.5c-1.4 0-2.5-.5-3.4-1.3.5-.3 1-.6 1.6-.8.5.4 1.1.6 1.8.6v1.5zm4 0v-1.5c.7 0 1.3-.2 1.8-.6.6.2 1.1.5 1.6.8-.9.8-2 1.3-3.4 1.3zM12 14c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z" />
                        </svg>
                        <span class="text-lg font-bold text-gray-950">{{ $profile->name ?? config('app.name') }}</span>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        {{ $profile->description ?? 'Membentuk generasi unggul yang berkarakter, berprestasi, dan siap menghadapi tantangan masa depan melalui pendidikan berkualitas tinggi.' }}
                    </p>
                    {{-- Social Links --}}
                    <div class="flex items-center gap-3">
                        <a href="#" aria-label="Facebook"
                            class="w-9 h-9 bg-white rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-950 hover:text-white transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram"
                            class="w-9 h-9 bg-white rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-950 hover:text-white transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube"
                            class="w-9 h-9 bg-white rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-950 hover:text-white transition shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Navigation --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-gray-950 mb-5">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-950 transition">Beranda</a></li>
                        <li><a href="#tentang" class="text-sm text-gray-600 hover:text-gray-950 transition">Tentang Kami</a></li>
                        <li><a href="#program" class="text-sm text-gray-600 hover:text-gray-950 transition">Program Akademik</a></li>
                        <li><a href="#fasilitas" class="text-sm text-gray-600 hover:text-gray-950 transition">Fasilitas</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-sm text-gray-600 hover:text-gray-950 transition">Berita</a></li>
                        <li><a href="{{ route('galeri.index') }}" class="text-sm text-gray-600 hover:text-gray-950 transition">Galeri</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-gray-950 mb-5">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shrink-0 shadow-sm mt-0.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">{{ $profile->email ?? 'info@sdharapanbangsa.sch.id' }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shrink-0 shadow-sm mt-0.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">{{ $profile->phone ?? '021-7890123' }}</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center shrink-0 shadow-sm mt-0.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">{{ $profile->address ?? 'Jl. Pendidikan No. 123, Jakarta Selatan' }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Jam Operasional --}}
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-gray-950 mb-5">Jam Operasional</h4>
                    <div class="bg-white rounded-xl p-5 shadow-sm space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Senin – Jumat</span>
                            <span class="font-semibold text-gray-950">07:00 – 15:00</span>
                        </div>
                        <div class="border-t border-gray-100"></div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Sabtu</span>
                            <span class="font-semibold text-gray-950">07:00 – 12:00</span>
                        </div>
                        <div class="border-t border-gray-100"></div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Minggu & Hari Libur</span>
                            <span class="font-semibold text-red-500">Tutup</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="border-t border-gray-300/50">
            <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} {{ $profile->name ?? config('app.name') }}. Hak cipta dilindungi.
                    </p>
                    <div class="flex items-center gap-6">
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-950 transition">Kebijakan Privasi</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-gray-950 transition">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Mobile menu toggle script --}}
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    document.getElementById('mobile-menu').classList.add('hidden');
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>