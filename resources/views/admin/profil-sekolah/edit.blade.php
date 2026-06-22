@extends('admin.layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Pengaturan Profil Sekolah</h2>
        <p class="text-sm text-gray-500 mt-1">Ubah identitas, logo, visi misi, dan kontak sekolah Anda.</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <form method="POST" action="{{ route('admin.profil-sekolah.update') }}" enctype="multipart/form-data" class="p-6 sm:p-8">
            @csrf @method('PUT')

            <div class="space-y-6">
                {{-- Nama Sekolah --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Nama Sekolah <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $profile->name) }}" required placeholder="Contoh: SD Harapan Bangsa"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('name') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                    @error('name')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Email Resmi Sekolah</label>
                        <input type="email" name="email" value="{{ old('email', $profile->email) }}" placeholder="Contoh: info@sdharapan.sch.id"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('email') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                        @error('email')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>
                    
                    {{-- Nomor Telepon --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" placeholder="Contoh: 08123456789"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('phone') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                        @error('phone')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Alamat --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Alamat Lengkap</label>
                    <textarea name="address" rows="2" placeholder="Tuliskan alamat lengkap sekolah..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all">{{ old('address', $profile->address) }}</textarea>
                    @error('address')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- Deskripsi/Sejarah --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Profil, Visi, dan Misi Sekolah</label>
                    <textarea name="description" rows="8" placeholder="Ceritakan sejarah, visi, dan misi sekolah..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all">{{ old('description', $profile->description) }}</textarea>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Simpan Perubahan
                </button>
            </div>
    </div>

    {{-- Kolom Sidebar: Logo Sekolah --}}
    <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-gray-900 text-center">Logo Sekolah</h3>
        </div>
        <div class="p-6 flex flex-col items-center text-center">
            <div class="w-40 h-40 bg-gray-50 border-2 border-dashed border-gray-200 rounded-2xl flex items-center justify-center mb-6 overflow-hidden relative group">
                @if($profile->logo)
                    <img src="{{ Storage::url($profile->logo) }}" alt="Logo Sekolah" class="w-full h-full object-contain p-2">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="text-white text-xs font-semibold bg-black/50 px-2 py-1 rounded">Logo Saat Ini</span>
                    </div>
                @else
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                @endif
            </div>

            <div class="w-full text-left">
                <label class="block text-sm font-bold text-gray-900 mb-2">Unggah Logo Baru</label>
                <input type="file" name="logo" accept="image/*"
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#ff6b35]/10 file:text-[#ff6b35] hover:file:bg-[#ff6b35]/20 focus:outline-none transition-all text-gray-600 cursor-pointer">
                <p class="text-xs text-gray-500 mt-2">Gunakan format PNG dengan latar transparan. Rekomendasi rasio 1:1 (kotak).</p>
                @error('logo')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>
        </div>
        </form>
    </div>
</div>
@endsection