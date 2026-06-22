@extends('public.layouts.app')

@section('title', 'Berita')

@section('content')
<section class="py-16 lg:py-24 bg-[#f5f0eb] min-h-screen">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Page Header --}}
        <div class="mb-12">
            <h1 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight mb-3">
                Berita & Kegiatan
            </h1>
            <p class="text-[15px] text-gray-600 leading-relaxed">
                Ikuti perkembangan kegiatan dan informasi terbaru dari sekolah kami.
            </p>
        </div>

        @if($news->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($news as $item)
            <a href="{{ route('berita.show', $item->slug) }}"
                class="group bg-white rounded-xl overflow-hidden hover:shadow-lg transition-shadow flex flex-col">
                <div class="relative h-52 overflow-hidden">
                    @if($item->thumbnail)
                    <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : Storage::url($item->thumbnail) }}"
                        alt="{{ $item->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    @endif
                    <span class="absolute top-3 left-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded">
                        {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}
                    </span>
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <h3 class="font-bold text-gray-950 text-[15px] leading-snug mb-2 group-hover:text-gray-600 transition line-clamp-2">
                        {{ $item->title }}
                    </h3>
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 flex-1">
                        {{ Str::limit(strip_tags($item->content), 120) }}
                    </p>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <span class="text-xs font-semibold text-gray-950 group-hover:text-gray-600 transition">
                            Baca Selengkapnya →
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $news->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            <p class="text-gray-400">Belum ada berita tersedia.</p>
        </div>
        @endif

    </div>
</section>
@endsection