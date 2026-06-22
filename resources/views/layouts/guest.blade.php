<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#f5f0eb]">
        <div class="min-h-screen flex w-full">
            
            {{-- Left Side: Image Banner --}}
            <div class="hidden lg:flex w-1/2 relative bg-gray-900 overflow-hidden m-4 lg:m-6 rounded-[2.5rem] shadow-2xl">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=2000&q=80" 
                     class="absolute inset-0 w-full h-full object-cover" 
                     alt="School Building">
                
                {{-- Gradient Overlay (Uniform elegant teal/blue) --}}
                <div class="absolute inset-0 bg-gradient-to-br from-[#0f766e]/85 to-[#0369a1]/85 mix-blend-multiply"></div>
                
                {{-- Text Overlay --}}
                <div class="absolute inset-0 p-12 xl:p-20 flex flex-col justify-center">
                    <div class="mb-8">
                        {{-- Large White Logo --}}
                        <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                    </div>
                    
                    <h1 class="text-4xl xl:text-5xl 2xl:text-[54px] font-black text-white leading-[1.15] mb-6 tracking-tight">
                        SD Harapan Bangsa<br>
                        <span class="font-medium text-white/90">School Management</span>
                    </h1>
                    
                    <p class="text-[16px] xl:text-[18px] text-white/80 max-w-lg leading-relaxed font-normal">
                        Membentuk generasi yang aktif tumbuh dan berprestasi. Akses sistem portal admin untuk mengelola kegiatan dan data sekolah secara terintegrasi.
                    </p>
                </div>
            </div>

            {{-- Right Side: Form --}}
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12 lg:p-20 relative">
                <div class="w-full max-w-md">
                    {{-- Mobile Logo (Hidden on Desktop) --}}
                    <div class="lg:hidden flex items-center gap-3 mb-10">
                        <div class="w-12 h-12 bg-gray-900 rounded-xl flex items-center justify-center shadow-md">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-900 tracking-tight">SD Harapan Bangsa</span>
                    </div>

                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>
