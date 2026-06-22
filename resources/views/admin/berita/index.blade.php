@extends('admin.layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Daftar Berita</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola publikasi artikel dan berita sekolah.</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.berita.create') }}" class="inline-flex items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tulis Berita Baru
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50/50 text-xs text-gray-500 font-semibold border-b border-gray-50 uppercase tracking-wider">
                <tr>
                    <th scope="col" class="px-6 py-4">Judul Artikel</th>
                    <th scope="col" class="px-6 py-4 text-center">Status</th>
                    <th scope="col" class="px-6 py-4">Penulis</th>
                    <th scope="col" class="px-6 py-4">Tanggal Rilis</th>
                    <th scope="col" class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($news as $item)
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 shrink-0 overflow-hidden border border-gray-200">
                                @if($item->thumbnail)
                                    <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="font-semibold text-gray-900 truncate max-w-xs md:max-w-md">{{ $item->title }}</div>
                        </div>
                    </td>
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
                    <td class="px-6 py-4 font-medium text-gray-700">{{ $item->user->name ?? 'Admin' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 flex items-center justify-center gap-3">
                        <a href="{{ route('admin.berita.edit', $item) }}" title="Edit Berita" class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                        </a>
                        <form method="POST" action="{{ route('admin.berita.destroy', $item) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?')">
                            @csrf @method('DELETE')
                            <button type="submit" title="Hapus Berita" class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-12 h-12 mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            <p class="text-sm font-medium">Belum ada berita yang diterbitkan.</p>
                            <p class="text-xs mt-1">Mulai dengan menulis berita baru.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($news->hasPages())
    <div class="px-6 py-4 border-t border-gray-50">
        {{ $news->links() }}
    </div>
    @endif
</div>
@endsection