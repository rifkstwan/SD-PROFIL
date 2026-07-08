@extends('admin.layouts.app')

@section('title', 'Edit Prestasi')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.prestasi.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar Prestasi
    </a>
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Edit Prestasi</h2>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl">
    <form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Baris Judul 1 (Contoh: Juara 1) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line1" value="{{ old('title_line1', $prestasi->title_line1) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('title_line1') border-red-500 bg-red-50 @enderror">
                    @error('title_line1')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Baris Judul 2 (Contoh: Olimpiade) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line2" value="{{ old('title_line2', $prestasi->title_line2) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('title_line2') border-red-500 bg-red-50 @enderror">
                    @error('title_line2')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Judul Lengkap Prestasi <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $prestasi->title) }}" required
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                       @error('title') border-red-500 bg-red-50 @enderror">
                @error('title')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" required
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                          @error('description') border-red-500 bg-red-50 @enderror">{{ old('description', $prestasi->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="category" value="{{ old('category', $prestasi->category) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('category') border-red-500 bg-red-50 @enderror">
                    @error('category')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Nama Siswa <span class="text-red-500">*</span></label>
                    <input type="text" name="student_name" value="{{ old('student_name', $prestasi->student_name) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('student_name') border-red-500 bg-red-50 @enderror">
                    @error('student_name')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Tahun/Tanggal <span class="text-red-500">*</span></label>
                    <input type="text" name="date" value="{{ old('date', $prestasi->date) }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('date') border-red-500 bg-red-50 @enderror">
                    @error('date')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Gambar Prestasi (Upload File) <span class="text-gray-400 font-normal ml-1">(Opsional)</span></label>
                    @if($prestasi->image)
                        <div class="mb-4">
                            <img src="{{ Str::startsWith($prestasi->image, 'http') ? $prestasi->image : Storage::url($prestasi->image) }}" alt="Current Image" class="h-32 w-auto object-cover rounded-xl border border-gray-200">
                        </div>
                    @endif
                    <div class="relative">
                        <input type="file" name="image" accept="image/*"
                            class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#ff6b35]/10 file:text-[#ff6b35] hover:file:bg-[#ff6b35]/20 focus:outline-none transition-all text-gray-600 cursor-pointer
                            @error('image') border-red-500 bg-red-50 @enderror">
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, WEBP. Maks 2MB.</p>
                    @error('image')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Atau Gunakan URL Gambar (Rekomendasi untuk Vercel)</label>
                    <input type="url" name="image_url" value="{{ old('image_url', Str::startsWith($prestasi->image, 'http') ? $prestasi->image : '') }}" placeholder="https://images.unsplash.com/..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('image_url') border-red-500 bg-red-50 @enderror">
                    <p class="text-xs text-gray-500 mt-2">Gunakan URL gambar dari internet (misal dari Unsplash, Imgur, dll) agar gambar tetap muncul saat di-deploy ke Vercel.</p>
                    @error('image_url')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
            <a href="{{ route('admin.prestasi.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Perbarui Prestasi
            </button>
        </div>
    </form>
</div>
@endsection
