@extends('public.layouts.app')

@section('title', $news->title)

@section('content')
<section class="py-16 lg:py-24 bg-[#f5f0eb] min-h-screen">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Back link --}}
        <a href="{{ route('berita.index') }}"
            class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-gray-950 transition mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Berita
        </a>

        {{-- Article --}}
        <article class="bg-white rounded-2xl overflow-hidden shadow-sm">

            {{-- Hero Image --}}
            @if($news->thumbnail)
            <div class="w-full h-64 sm:h-80 lg:h-96 overflow-hidden">
                <img src="{{ Str::startsWith($news->thumbnail, 'http') ? $news->thumbnail : Storage::url($news->thumbnail) }}"
                    alt="{{ $news->title }}"
                    class="w-full h-full object-cover" />
            </div>
            @endif

            {{-- Content --}}
            <div class="p-6 sm:p-8 lg:p-10">
                <div class="flex items-center gap-3 mb-4">
                    <span class="bg-gray-950 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $news->published_at ? $news->published_at->format('d M Y') : '' }}
                    </span>
                </div>

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-gray-950 leading-tight tracking-tight mb-6">
                    {{ $news->title }}
                </h1>

                <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed text-[15px]">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </article>

        {{-- Other news --}}
        @php
        $others = \App\Models\News::where('status', 'published')
        ->where('id', '!=', $news->id)
        ->latest('published_at')->take(3)->get();
        @endphp
        @if($others->count())
        <div class="mt-14">
            <h2 class="text-xl font-bold text-gray-950 mb-6">Berita Lainnya</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach($others as $item)
                <a href="{{ route('berita.show', $item->slug) }}"
                    class="group bg-white rounded-xl overflow-hidden hover:shadow-lg transition-shadow flex flex-col">
                    <div class="relative h-40 overflow-hidden">
                        @if($item->thumbnail)
                        <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : Storage::url($item->thumbnail) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        @endif
                        <span class="absolute top-2 left-2 bg-black/60 text-white text-[10px] px-2 py-0.5 rounded">
                            {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-gray-950 text-[13px] leading-snug group-hover:text-gray-600 transition line-clamp-2">
                            {{ $item->title }}
                        </h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
@endsection