@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.berita.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar Berita
    </a>
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Perbarui Berita</h2>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl">
    <form method="POST" action="{{ route('admin.berita.update', $news) }}" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf @method('PUT')

        <div class="space-y-6">
            {{-- Judul --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" placeholder="Masukkan judul berita yang menarik..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                       @error('title') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                @error('title')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            {{-- Konten --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Isi Konten Berita <span class="text-red-500">*</span></label>
                <textarea name="content" rows="12" placeholder="Tuliskan isi berita selengkapnya di sini..."
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                          @error('content') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">{{ old('content', $news->content) }}</textarea>
                @error('content')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Thumbnail --}}
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Gambar Utama (Upload File) <span class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                        
                        @if($news->thumbnail)
                        <div class="mb-3 relative group rounded-xl overflow-hidden border border-gray-200 inline-block">
                            <img src="{{ Str::startsWith($news->thumbnail, 'http') ? $news->thumbnail : Storage::url($news->thumbnail) }}" alt="Current Thumbnail" class="w-full max-w-[200px] h-32 object-cover">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="text-white text-xs font-semibold bg-black/50 px-2 py-1 rounded">Gambar Saat Ini</span>
                            </div>
                        </div>
                        @endif

                        <div class="relative">
                            <input type="file" name="thumbnail" accept="image/*"
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#ff6b35]/10 file:text-[#ff6b35] hover:file:bg-[#ff6b35]/20 focus:outline-none transition-all text-gray-600 cursor-pointer
                                @error('thumbnail') border-red-500 bg-red-50 @enderror">
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG, WEBP. Biarkan kosong jika tidak ingin mengubah gambar.</p>
                        @error('thumbnail')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-900 mb-2">Atau Gunakan URL Gambar (Rekomendasi untuk Vercel)</label>
                        <input type="url" name="thumbnail_url" value="{{ old('thumbnail_url', Str::startsWith($news->thumbnail, 'http') ? $news->thumbnail : '') }}" placeholder="https://images.unsplash.com/..."
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                               @error('thumbnail_url') border-red-500 bg-red-50 @enderror">
                        <p class="text-xs text-gray-500 mt-2">Gunakan URL gambar dari internet (misal dari Unsplash, Imgur, dll) agar gambar tetap muncul saat di-deploy ke Vercel.</p>
                        @error('thumbnail_url')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Status Publikasi</label>
                    <div class="relative">
                        <select name="status"
                            class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all cursor-pointer">
                            <option value="draft" {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                            <option value="published" {{ old('status', $news->status) === 'published' ? 'selected' : '' }}>Terbitkan Sekarang (Published)</option>
                        </select>
                        <svg class="w-4 h-4 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
            <a href="{{ route('admin.berita.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Perbarui Berita
            </button>
        </div>
    </form>
</div>
@endsection