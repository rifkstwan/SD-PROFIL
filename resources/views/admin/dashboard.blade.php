@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between md:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Halaman Utama</h2>
        <p class="text-sm text-gray-500 mt-1">Selamat datang kembali, <span class="font-medium text-gray-800">{{ auth()->user()->name }}</span>.</p>
    </div>
    
    {{-- Functional Date Picker Form --}}
    <form action="{{ route('admin.dashboard') }}" method="GET" class="relative inline-flex items-center">
        <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <select name="period" onchange="this.form.submit()" class="appearance-none bg-white border border-gray-200 rounded-xl pl-9 pr-9 py-2 shadow-sm text-[13px] font-semibold text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] cursor-pointer transition-colors w-full sm:w-auto">
            <option value="this_month" {{ request('period', 'this_month') === 'this_month' ? 'selected' : '' }}>Bulan Ini</option>
            <option value="last_30_days" {{ request('period') === 'last_30_days' ? 'selected' : '' }}>30 Hari Terakhir</option>
            <option value="this_year" {{ request('period') === 'this_year' ? 'selected' : '' }}>Tahun Ini</option>
            <option value="all_time" {{ request('period') === 'all_time' ? 'selected' : '' }}>Semua Waktu</option>
        </select>
        <svg class="w-3.5 h-3.5 text-gray-400 absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </form>
</div>

{{-- Stats Cards Row --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
    {{-- Card 1: Total Berita --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between group hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <p class="text-[13px] font-semibold text-gray-500">Total Berita</p>
            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-[#ff6b35]/10 group-hover:text-[#ff6b35] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" /></svg>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <h3 class="text-3xl font-black text-gray-900 leading-none tracking-tight">{{ $stats['total_news'] }}</h3>
            @if($stats['period'] !== 'all_time')
                @if($stats['total_news_growth'] > 0)
                <span class="inline-flex items-center gap-0.5 bg-green-50 text-green-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    {{ $stats['total_news_growth'] }}%
                </span>
                @elseif($stats['total_news_growth'] < 0)
                <span class="inline-flex items-center gap-0.5 bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    {{ abs($stats['total_news_growth']) }}%
                </span>
                @else
                <span class="inline-flex items-center gap-0.5 bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    0%
                </span>
                @endif
            @endif
        </div>
        @if($stats['period'] !== 'all_time')
        <p class="text-[11px] text-gray-400 mt-3">{{ $stats['period_label'] }}: {{ $stats['total_news_last_month'] }}</p>
        @else
        <p class="text-[11px] text-gray-400 mt-3">Total keseluruhan data</p>
        @endif
    </div>

    {{-- Card 2: Berita Published --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between group hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <p class="text-[13px] font-semibold text-gray-500">Berita Aktif</p>
            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-green-50 group-hover:text-green-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <h3 class="text-3xl font-black text-gray-900 leading-none tracking-tight">{{ $stats['published_news'] }}</h3>
            @if($stats['period'] !== 'all_time')
                @if($stats['published_news_growth'] > 0)
                <span class="inline-flex items-center gap-0.5 bg-green-50 text-green-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    {{ $stats['published_news_growth'] }}%
                </span>
                @elseif($stats['published_news_growth'] < 0)
                <span class="inline-flex items-center gap-0.5 bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    {{ abs($stats['published_news_growth']) }}%
                </span>
                @else
                <span class="inline-flex items-center gap-0.5 bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    0%
                </span>
                @endif
            @endif
        </div>
        @if($stats['period'] !== 'all_time')
        <p class="text-[11px] text-gray-400 mt-3">{{ $stats['period_label'] }}: {{ $stats['published_news_last_month'] }}</p>
        @else
        <p class="text-[11px] text-gray-400 mt-3">Total keseluruhan data</p>
        @endif
    </div>

    {{-- Card 3: Total Galeri --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between group hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <p class="text-[13px] font-semibold text-gray-500">Album Galeri</p>
            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <h3 class="text-3xl font-black text-gray-900 leading-none tracking-tight">{{ $stats['total_gallery'] }}</h3>
            @if($stats['period'] !== 'all_time')
                @if($stats['total_gallery_growth'] > 0)
                <span class="inline-flex items-center gap-0.5 bg-green-50 text-green-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    {{ $stats['total_gallery_growth'] }}%
                </span>
                @elseif($stats['total_gallery_growth'] < 0)
                <span class="inline-flex items-center gap-0.5 bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                    {{ abs($stats['total_gallery_growth']) }}%
                </span>
                @else
                <span class="inline-flex items-center gap-0.5 bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded text-[10px] font-bold mb-0.5">
                    0%
                </span>
                @endif
            @endif
        </div>
        @if($stats['period'] !== 'all_time')
        <p class="text-[11px] text-gray-400 mt-3">{{ $stats['period_label'] }}: {{ $stats['total_gallery_last_month'] }}</p>
        @else
        <p class="text-[11px] text-gray-400 mt-3">Total keseluruhan data</p>
        @endif
    </div>

    {{-- Card 4: Total Staf / Info Akses Staf IT --}}
    @if(auth()->user()->role === 'super_admin')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between group hover:shadow-md transition-shadow">
        <div class="flex justify-between items-start mb-4">
            <p class="text-[13px] font-semibold text-gray-500">Total Pengguna</p>
            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-purple-50 group-hover:text-purple-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
        </div>
        <div class="flex items-end gap-3">
            <h3 class="text-3xl font-black text-gray-900 leading-none tracking-tight">{{ $stats['total_staf'] }}</h3>
        </div>
        <p class="text-[11px] text-gray-400 mt-3">Terdaftar di sistem portal</p>
    </div>
    @else
    <div class="bg-gradient-to-br from-[#ff6b35] to-[#f54200] rounded-2xl shadow-sm p-6 flex flex-col justify-between relative overflow-hidden text-white group hover:shadow-md transition-shadow">
        {{-- Pattern Background --}}
        <div class="absolute top-0 right-0 opacity-10 group-hover:opacity-20 transition-opacity">
            <svg width="120" height="120" viewBox="0 0 100 100" fill="currentColor">
                <circle cx="80" cy="20" r="40" />
                <circle cx="90" cy="80" r="20" />
            </svg>
        </div>
        <div class="relative z-10 flex justify-between items-start mb-4">
            <p class="text-[13px] font-bold text-white/90">Status Akses Anda</p>
            <div class="w-8 h-8 rounded-lg bg-white/20 backdrop-blur-sm flex items-center justify-center text-white">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            </div>
        </div>
        <div class="relative z-10 flex items-end gap-3">
            <h3 class="text-2xl font-black text-white leading-none tracking-tight">Staf IT</h3>
        </div>
        <p class="relative z-10 text-[11px] text-white/80 mt-3">Fokus: Manajemen Berita & Galeri</p>
    </div>
    @endif
</div>

{{-- Recent News / Orders Table equivalent --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="px-6 py-5 border-b border-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h3 class="text-base font-bold text-gray-900">Publikasi Terbaru</h3>
        <div class="flex items-center gap-2">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="relative">
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="bg-gray-50 border border-gray-100 rounded-lg pl-9 pr-4 py-2 text-xs focus:outline-none focus:ring-1 focus:ring-[#ff6b35] focus:bg-white transition-colors w-full sm:w-48">
            </form>
            <a href="{{ route('admin.berita.index') }}" class="px-3 py-2 bg-gray-50 border border-gray-100 text-gray-600 rounded-lg text-xs font-semibold hover:bg-gray-100 flex items-center gap-2 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/></svg>
                Semua
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/50 text-xs text-gray-500 font-semibold border-b border-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4">Judul Artikel</th>
                    <th scope="col" class="px-6 py-4">Tanggal Rilis</th>
                    <th scope="col" class="px-6 py-4">Penulis</th>
                    <th scope="col" class="px-6 py-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($recentNews as $item)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 shrink-0 overflow-hidden border border-gray-200">
                                @if($item->thumbnail)
                                    <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="font-semibold text-gray-900 truncate max-w-[200px] sm:max-w-xs">{{ $item->title }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">Admin Sekolah</td>
                    <td class="px-6 py-4 text-center">
                        @if($item->status === 'published')
                        <span class="inline-flex items-center gap-1.5 bg-green-50 text-green-700 px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wide uppercase">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            Published
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wide uppercase">
                            <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full"></span>
                            Draft
                        </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-8 text-center text-gray-400">Belum ada berita yang dipublikasikan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection