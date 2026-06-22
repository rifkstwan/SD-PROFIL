@extends('admin.layouts.app')

@section('title', 'Perbarui Album Galeri')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.galeri.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar Galeri
    </a>
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Perbarui Album Galeri</h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    {{-- Bagian Form Utama --}}
    <div class="lg:col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-gray-900">Informasi Album</h3>
            <p class="text-xs text-gray-500 mt-1">Ubah nama atau deskripsi album.</p>
        </div>
        <form method="POST" action="{{ route('admin.galeri.update', $galeri) }}" enctype="multipart/form-data" class="p-6">
            @csrf @method('PUT')

            <div class="space-y-5">
                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Judul Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $galeri->title) }}"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('title') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                    @error('title')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Deskripsi Album</label>
                    <textarea name="description" rows="4"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all">{{ old('description', $galeri->description) }}</textarea>
                </div>

                {{-- Tambah Foto --}}
                <div class="pt-2">
                    <label class="block text-sm font-bold text-gray-900 mb-2">Tambah Foto Baru <span class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                    <div class="relative">
                        <input type="file" name="images[]" accept="image/*" multiple
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#ff6b35]/10 file:text-[#ff6b35] hover:file:bg-[#ff6b35]/20 focus:outline-none transition-all text-gray-600 cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-50">
                <button type="submit" class="w-full inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-6 py-3 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- Bagian Galeri Foto --}}
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
            <div>
                <h3 class="font-bold text-gray-900">Foto dalam Album</h3>
                <p class="text-xs text-gray-500 mt-1">Total {{ $galeri->images->count() }} foto tersedia.</p>
            </div>
        </div>
        
        <div class="p-6">
            @if($galeri->images->count())
            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach($galeri->images as $image)
                <div class="relative group rounded-xl overflow-hidden bg-gray-100 border border-gray-100 aspect-square">
                    <img src="{{ Storage::url($image->image_path) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    
                    {{-- Overlay Hapus --}}
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                        <form method="POST" action="{{ route('admin.galeri-image.destroy', $image) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus Foto" class="w-10 h-10 rounded-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="py-12 flex flex-col items-center justify-center text-gray-400 bg-gray-50 rounded-xl border border-gray-200 border-dashed">
                <svg class="w-10 h-10 mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <p class="text-sm font-medium">Belum ada foto.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection