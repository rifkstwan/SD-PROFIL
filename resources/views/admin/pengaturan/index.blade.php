@extends('admin.layouts.app')

@section('title', 'Pengaturan Situs')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Pengaturan Situs</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola informasi dasar yang akan ditampilkan pada footer dan halaman kontak situs publik Anda.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    {{-- Form Pengaturan Utama --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">


        <form method="POST" action="{{ route('admin.pengaturan.update') }}" class="p-6 sm:p-8">
            @csrf

            <div class="space-y-6">
                {{-- Nama Situs --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Nama Situs / Sekolah</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" placeholder="Contoh: SD Negeri 1 Nusantara"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('site_name') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                    @error('site_name')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Email Kontak</label>
                        <input type="email" name="site_email" value="{{ old('site_email', $settings['site_email'] ?? '') }}" placeholder="Contoh: info@sdnusantara.sch.id"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('site_email') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                        @error('site_email')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>
                    
                    {{-- Telepon --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Nomor Telepon Hotline</label>
                        <input type="text" name="site_phone" value="{{ old('site_phone', $settings['site_phone'] ?? '') }}" placeholder="Contoh: (021) 1234567"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('site_phone') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                        @error('site_phone')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Alamat Lengkap</label>
                    <textarea name="site_address" rows="3" placeholder="Tuliskan alamat fisik sekolah..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('site_address') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">{{ old('site_address', $settings['site_address'] ?? '') }}</textarea>
                    @error('site_address')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>

    {{-- Kartu Info Tambahan di Kanan --}}
    <div class="lg:col-span-1 space-y-6">
        <div class="bg-gradient-to-br from-[#ff6b35] to-[#ff8c61] rounded-2xl shadow-sm overflow-hidden text-white relative">
            {{-- Decorative pattern --}}
            <div class="absolute top-0 right-0 opacity-10">
                <svg width="120" height="120" viewBox="0 0 100 100" fill="currentColor">
                    <circle cx="80" cy="20" r="40" />
                    <circle cx="90" cy="80" r="20" />
                    <circle cx="20" cy="90" r="30" />
                </svg>
            </div>
            
            <div class="p-6 relative z-10">
                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mb-4 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold mb-2">Informasi Penting</h3>
                <p class="text-white/90 text-sm leading-relaxed mb-4">
                    Pengaturan di halaman ini akan langsung berdampak pada tampilan publik Website Anda, terutama pada bagian Footer (bawah situs) dan halaman Hubungi Kami.
                </p>
                <div class="bg-black/10 rounded-xl p-4 backdrop-blur-sm border border-white/10">
                    <ul class="text-xs text-white/90 space-y-2">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Pastikan nomor telepon aktif untuk memudahkan wali murid menghubungi sekolah.
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Penulisan alamat yang lengkap dapat membantu pada integrasi Google Maps di halaman publik.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center gap-4 group hover:border-[#ff6b35]/30 transition-colors cursor-pointer" onclick="window.open('{{ route('home') }}', '_blank')">
            <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 text-[#ff6b35]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 text-sm">Pratinjau Situs</h4>
                <p class="text-xs text-gray-500 mt-0.5">Lihat bagaimana perubahan pengaturan Anda ditampilkan ke publik.</p>
            </div>
            <div class="ml-auto text-gray-400 group-hover:text-[#ff6b35] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </div>
        </div>
    </div>
</div>
@endsection