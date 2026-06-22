@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Daftar Album Galeri</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola album dan foto kegiatan sekolah.</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Buat Album Baru
        </a>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
    @forelse($galleries as $gallery)
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group flex flex-col">
        <div class="relative w-full h-48 bg-gray-100 overflow-hidden">
            @if($gallery->images->first())
            <img src="{{ Str::startsWith($gallery->images->first()->image_path, 'http') ? $gallery->images->first()->image_path : Storage::url($gallery->images->first()->image_path) }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            @else
            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2">
                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="text-xs font-medium">Belum ada foto</span>
            </div>
            @endif
            
            {{-- Foto Count Badge --}}
            <div class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm text-white px-2.5 py-1 rounded-full text-[10px] font-bold flex items-center gap-1.5">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $gallery->images->count() }} Foto
            </div>
        </div>
        
        <div class="p-5 flex-1 flex flex-col">
            <h3 class="font-bold text-gray-900 text-lg leading-tight mb-2 line-clamp-2">{{ $gallery->title }}</h3>
            <p class="text-xs text-gray-500 mb-4">{{ $gallery->created_at->format('d M Y') }}</p>
            
            <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-50">
                <a href="{{ route('admin.galeri.edit', $gallery) }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-[#ff6b35] hover:text-[#e85b25] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Edit Album
                </a>
                <form method="POST" action="{{ route('admin.galeri.destroy', $gallery) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus album ini beserta semua fotonya secara permanen?')">
                    @csrf @method('DELETE')
                    <button type="submit" title="Hapus Album" class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-12 flex flex-col items-center justify-center text-gray-400 bg-white rounded-2xl border border-gray-100 border-dashed">
        <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <p class="text-sm font-medium text-gray-500">Belum ada album galeri.</p>
        <p class="text-xs mt-1">Mulai dengan membuat album baru dan mengunggah foto.</p>
    </div>
    @endforelse
</div>

@if($galleries->hasPages())
<div class="mt-6">
    {{ $galleries->links() }}
</div>
@endif
@endsection