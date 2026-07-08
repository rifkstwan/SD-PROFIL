@extends('admin.layouts.app')

@section('title', 'Buat Album Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galeri.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar Galeri
    </a>
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Buat Album Baru</h2>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf

        <div class="space-y-6">
            {{-- Judul --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Judul Album <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Contoh: Kegiatan Porseni 2026..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                       @error('title') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                @error('title')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Deskripsi Album <span class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                <textarea name="description" rows="3" placeholder="Tulis sedikit penjelasan tentang album ini..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all">{{ old('description') }}</textarea>
            </div>

            {{-- Upload Foto --}}
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Unggah Foto-foto <span class="text-gray-400 font-normal ml-1">(Pilihan upload file)</span></label>
                    <div class="relative">
                        <input type="file" name="images[]" accept="image/*" multiple
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#ff6b35]/10 file:text-[#ff6b35] hover:file:bg-[#ff6b35]/20 focus:outline-none transition-all text-gray-600 cursor-pointer
                            @error('images.*') border-red-500 bg-red-50 @enderror">
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP. Anda bisa memilih **lebih dari satu** foto sekaligus.</p>
                    @error('images.*')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Atau Gunakan URL Gambar (Satu URL Per Baris - Rekomendasi untuk Vercel)</label>
                    <textarea name="image_urls" rows="4" placeholder="https://images.unsplash.com/photo-1
https://images.unsplash.com/photo-2"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('image_urls') border-red-500 bg-red-50 @enderror">{{ old('image_urls') }}</textarea>
                    <p class="text-xs text-gray-500 mt-2">Gunakan URL gambar dari internet. Masukkan satu URL per baris agar gambar tetap muncul saat di-deploy ke Vercel.</p>
                    @error('image_urls')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
            <a href="{{ route('admin.galeri.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Album Galeri
            </button>
        </div>
    </form>
</div>
@endsection