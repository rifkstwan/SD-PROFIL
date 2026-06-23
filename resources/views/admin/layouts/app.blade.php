<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f5f5] font-sans text-gray-900">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden p-3 sm:p-5 relative">
        
        {{-- Mobile Overlay --}}
        <div x-show="sidebarOpen" 
             x-transition.opacity 
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-gray-900/50 z-40 md:hidden backdrop-blur-sm"
             style="display: none;"></div>

        {{-- Sidebar Card --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-[120%] md:translate-x-0'" 
               class="w-64 bg-white rounded-[1.5rem] flex flex-col flex-shrink-0 shadow-sm border border-gray-100 overflow-hidden fixed md:relative z-50 h-[calc(100vh-1.5rem)] sm:h-[calc(100vh-2.5rem)] md:h-auto transition-transform duration-300 ease-in-out left-3 sm:left-5 top-3 sm:top-5 md:left-auto md:top-auto md:translate-x-0">
            <div class="px-6 py-8 flex items-center justify-between gap-3 shrink-0">
                {{-- Logo Orange Box --}}
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain drop-shadow-md" />
                <span class="text-xl font-bold tracking-tight text-gray-900">{{ config('app.name') }}</span>
            </div>

            <nav class="flex-1 px-4 pb-6 space-y-6 overflow-y-auto scrollbar-hide">
                {{-- Menu Group 1 --}}
                <div>
                    <p class="px-3 text-xs font-semibold text-gray-400 mb-2 tracking-wide">Menu</p>
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.dashboard') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.berita.index') }}"
                            class="flex items-center justify-between px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.berita.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
                                Berita
                            </div>
                        </a>
                        <a href="{{ route('admin.galeri.index') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.galeri.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            Galeri
                        </a>
                        <a href="{{ route('admin.prestasi.index') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.prestasi.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Prestasi
                        </a>
                        <a href="{{ route('admin.inquiries.index') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.inquiries.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <div class="relative flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                @php $unreadInquiries = \App\Models\Inquiry::where('is_read', false)->count(); @endphp
                                @if($unreadInquiries > 0)
                                    <span class="absolute -top-1 -right-1 flex h-2.5 w-2.5">
                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-orange-500 border border-white"></span>
                                    </span>
                                @endif
                            </div>
                            Pesan Masuk
                        </a>
                    </div>
                </div>

                {{-- Menu Group 2 --}}
                <div>
                    <p class="px-3 text-xs font-semibold text-gray-400 mb-2 tracking-wide">General</p>
                    <div class="space-y-1">
                        <a href="{{ route('admin.profil-sekolah.edit') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.profil-sekolah.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            Profil Sekolah
                        </a>

                        @if(auth()->user()->role === 'super_admin')
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.users.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            Kelola Staf
                        </a>
                        <a href="{{ route('admin.pengaturan.index') }}"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium transition-colors
                            {{ request()->routeIs('admin.pengaturan.*') ? 'bg-[#ff6b35] text-white shadow-md shadow-orange-500/20' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Pengaturan
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Menu Group 3 --}}
                <div>
                    <p class="px-3 text-xs font-semibold text-gray-400 mb-2 tracking-wide">Publik</p>
                    <div class="space-y-1">
                        <a href="{{ route('home') }}" target="_blank"
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[14px] font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                            Lihat Landing Page
                        </a>
                    </div>
                </div>
            </nav>

            {{-- Logout --}}
            <div class="px-4 py-4 shrink-0">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-2 text-sm text-red-500 font-semibold px-4 py-3 rounded-xl hover:bg-red-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        Log out
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content Container --}}
        <div class="flex-1 flex flex-col w-full md:pl-5 lg:pl-8 overflow-hidden h-full">

            {{-- Topbar --}}
            <header class="py-2 md:py-4 flex items-center justify-between z-10 shrink-0">
                {{-- Left: Mobile Menu Trigger & Title --}}
                <div class="flex items-center gap-3 md:gap-4">
                    <button @click="sidebarOpen = true" class="md:hidden p-2 text-gray-600 bg-white rounded-lg shadow-sm border border-gray-100 hover:bg-gray-50 active:bg-gray-100 transition-colors shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div class="flex flex-col">
                        <div class="hidden sm:flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">
                            <span>Admin</span>
                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                            <span class="text-[#ff6b35]">@yield('title', 'Panel')</span>
                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                            <div x-data="{ time: new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) }"
                                 x-init="setInterval(() => time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }), 1000)"
                                 class="flex items-center gap-1.5 text-gray-500 bg-gray-100/80 px-2 py-0.5 rounded-md">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span x-text="time"></span>
                            </div>
                        </div>
                        <h1 class="text-lg md:text-xl font-bold text-gray-900 tracking-tight">
                            Halo, {{ explode(' ', trim(auth()->user()->name))[0] }}!
                        </h1>
                    </div>
                </div>

                {{-- Right: Profile & Actions --}}
                <div class="flex items-center gap-3 sm:gap-4">
                    {{-- Refresh & Notifications --}}
                    <div class="hidden sm:flex items-center gap-2">
                        <button onclick="window.location.reload()" title="Refresh Halaman" class="w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center text-gray-500 hover:text-gray-900 shadow-sm transition-colors active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        </button>
                        
                        {{-- Notification Dropdown --}}
                        <div x-data="{ notifOpen: false }" class="relative">
                            <button @click="notifOpen = !notifOpen" @click.away="notifOpen = false" title="Notifikasi" class="w-10 h-10 bg-white border border-gray-200 rounded-full flex items-center justify-center text-gray-500 hover:text-gray-900 shadow-sm transition-colors relative active:scale-95">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <span class="absolute top-0 right-0 w-4 h-4 bg-[#ff6b35] border-2 border-white rounded-full text-[8px] font-bold text-white flex items-center justify-center shadow-sm">
                                        {{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </button>

                            {{-- Dropdown Body --}}
                            <div x-show="notifOpen" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-lg border border-gray-100 z-50 overflow-hidden"
                                 style="display: none;">
                                 
                                <div class="px-4 py-3 border-b border-gray-50 flex items-center justify-between bg-gray-50/50">
                                    <h3 class="text-sm font-bold text-gray-900">Notifikasi</h3>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                    <form method="POST" action="{{ route('admin.notifications.read-all') }}">
                                        @csrf
                                        <button type="submit" class="text-[11px] font-semibold text-[#ff6b35] hover:text-[#e85b25] transition-colors">Tandai semua dibaca</button>
                                    </form>
                                    @endif
                                </div>
                                
                                <div class="max-h-80 overflow-y-auto scrollbar-hide">
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                        <div class="px-4 py-3 border-b border-gray-50 hover:bg-gray-50/50 transition-colors flex gap-3 group">
                                            <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-[#ff6b35] shrink-0 mt-0.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-xs font-semibold text-gray-900">{{ $notification->data['title'] ?? 'Info Sistem' }}</p>
                                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                                <p class="text-[10px] text-gray-400 mt-1.5 font-medium">{{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                            <div class="shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <form method="POST" action="{{ route('admin.notifications.read', $notification->id) }}">
                                                    @csrf
                                                    <button type="submit" title="Tandai dibaca" class="text-gray-400 hover:text-[#ff6b35] p-1 rounded-full hover:bg-orange-50 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="px-4 py-8 text-center flex flex-col items-center">
                                            <svg class="w-10 h-10 text-gray-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                            <p class="text-xs text-gray-400 font-medium">Belum ada notifikasi baru.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Profile Pill with Dropdown --}}
                    <div x-data="{ profileMenuOpen: false }" class="relative">
                        <div @click="profileMenuOpen = !profileMenuOpen" @click.away="profileMenuOpen = false" title="Profil Saya" class="bg-white border border-gray-200 rounded-full p-1.5 flex items-center gap-3 shadow-sm cursor-pointer hover:bg-gray-50 transition-colors active:scale-95">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#ff6b35] to-[#f54200] flex items-center justify-center text-xs font-bold text-white shadow-inner">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="pr-3 hidden md:block">
                                <p class="text-[13px] font-bold text-gray-900 leading-none">{{ auth()->user()->name }}</p>
                                <p class="text-[11px] text-gray-500 font-medium mt-1 leading-none">
                                    {{ auth()->user()->role === 'super_admin' ? 'Admin' : 'Staf' }}
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-gray-400 mr-2 hidden md:block transition-transform duration-200" :class="profileMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>

                        {{-- Dropdown Menu --}}
                        <div x-show="profileMenuOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50"
                             style="display: none;">
                             <div class="px-4 py-2 border-b border-gray-50 md:hidden">
                                 <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                                 <p class="text-[11px] text-gray-500 font-medium mt-0.5 leading-none">{{ auth()->user()->role === 'super_admin' ? 'Admin' : 'Staf' }}</p>
                             </div>
                             @if(auth()->user()->role === 'super_admin')
                             <a href="{{ route('admin.pengaturan.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#ff6b35] transition-colors">
                                 Pengaturan
                             </a>
                             @endif
                             <form method="POST" action="{{ route('logout') }}" class="block w-full border-t border-gray-50 mt-1 pt-1">
                                 @csrf
                                 <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 font-medium hover:bg-red-50 transition-colors">
                                     Keluar (Log out)
                                 </button>
                             </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- Flash Message --}}
            <div class="shrink-0 pt-2 pb-4">
                @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm shadow-sm flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('error') }}
                </div>
                @endif
            </div>

            {{-- Page Content --}}
            <main class="flex-1 overflow-y-auto pb-8 scrollbar-hide">
                @yield('content')
            </main>

        </div>
    </div>
    
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</body>
</html>