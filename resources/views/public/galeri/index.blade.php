@extends('public.layouts.app')

@section('title', 'Galeri Sekolah')

@section('content')
<section class="pt-32 pb-8 lg:pb-12 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 mb-12">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-center">
            <h1 class="text-3xl sm:text-4xl lg:text-6xl font-semibold text-gray-950 leading-tight">
                Jelajahi momen<br>
                <span class="font-black tracking-tight text-4xl sm:text-5xl lg:text-7xl">sekolah kami</span>
            </h1>
            <div class="flex flex-col justify-center lg:pl-10">
                <p class="text-[16px] text-gray-500 leading-relaxed">
                    Dokumentasi berbagai kegiatan dan aktivitas di lingkungan sekolah kami. Dari kegiatan belajar mengajar hingga ekstrakurikuler dan acara sekolah, semua momen berharga terekam di sini.
                </p>
            </div>
        </div>
    </div>

    {{-- Auto-scrolling Marquee Carousel --}}
    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 35s linear infinite;
        }
        /* Allow pause on hover */
        .group-marquee:hover .animate-marquee {
            animation-play-state: paused;
        }
    </style>
    
    <div class="overflow-hidden pb-8 pt-4 w-full group-marquee">
        <div class="flex w-max animate-marquee items-center">
            {{-- First Set --}}
            <div class="flex gap-6 pr-6">
                @foreach($allImages->take(8) as $image)
                <div class="w-64 sm:w-72 md:w-80 lg:w-96 flex-shrink-0">
                    <div class="aspect-[4/3] overflow-hidden group cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300"
                        onclick="openLightbox(this)">
                        <img src="{{ str_starts_with($image->image_path, 'http') ? $image->image_path : Storage::url($image->image_path) }}"
                            alt="{{ $image->caption ?? $image->gallery->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&w=800&q=80';" />
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- Second Set (Duplicate for seamless loop) --}}
            <div class="flex gap-6 pr-6" aria-hidden="true">
                @foreach($allImages->take(8) as $image)
                <div class="w-64 sm:w-72 md:w-80 lg:w-96 flex-shrink-0">
                    <div class="aspect-[4/3] overflow-hidden group cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300"
                        onclick="openLightbox(this)">
                        <img src="{{ str_starts_with($image->image_path, 'http') ? $image->image_path : Storage::url($image->image_path) }}"
                            alt="{{ $image->caption ?? $image->gallery->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&w=800&q=80';" />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Scroll Prompt --}}
    <div class="text-center pt-8 pb-10">
        <a href="#semua-foto" class="inline-flex flex-col items-center gap-2 text-gray-500 hover:text-[#1a4a38] transition group">
            <span class="text-sm font-medium">Scroll to view gallery</span>
            <svg class="w-5 h-5 group-hover:translate-y-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </a>
    </div>
</section>

{{-- Full Gallery Section --}}
<section id="semua-foto" class="py-12 lg:py-16 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        <h2 class="text-2xl lg:text-3xl font-black text-gray-950 mb-8">Semua Foto</h2>

        {{-- Filter Buttons --}}
        <div class="flex flex-wrap gap-2 mb-10" id="gallery-filters">
            <button data-filter="all"
                class="filter-btn px-5 py-2 rounded-full text-sm font-medium bg-gray-950 text-white transition-all duration-200">
                Semua
            </button>
            @foreach($galleries as $gallery)
            <button data-filter="gallery-{{ $gallery->id }}"
                class="filter-btn px-5 py-2 rounded-full text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all duration-200">
                {{ $gallery->title }}
            </button>
            @endforeach
        </div>

        {{-- Photo Grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3" id="gallery-grid">
            @foreach($allImages as $image)
            <div class="gallery-item group relative overflow-hidden rounded-xl aspect-square cursor-pointer"
                data-category="gallery-{{ $image->gallery_id }}"
                onclick="openLightbox(this)">
                <img src="{{ str_starts_with($image->image_path, 'http') ? $image->image_path : Storage::url($image->image_path) }}"
                    alt="{{ $image->caption ?? $image->gallery->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1546410531-bb4caa6b424d?auto=format&fit=crop&w=800&q=80';" />
                {{-- Hover Overlay --}}
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-end">
                    <div class="p-4 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white text-sm font-semibold">{{ $image->gallery->title }}</p>
                        @if($image->caption)
                        <p class="text-white/80 text-xs mt-0.5">{{ $image->caption }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($allImages->isEmpty())
        <div class="text-center py-20">
            <p class="text-gray-400 text-sm">Belum ada foto galeri.</p>
        </div>
        @endif
    </div>
</section>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/90 p-4" onclick="closeLightbox(event)">
    <button onclick="closeLightbox(event)" class="absolute top-4 right-4 text-white/80 hover:text-white z-10">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-lg" />
</div>

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-gray-950', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-gray-950', 'text-white');

            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Lightbox
    function openLightbox(el) {
        const img = el.querySelector('img');
        document.getElementById('lightbox-img').src = img.src;
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox(e) {
        if (e.target === document.getElementById('lightbox') || e.target.closest('button')) {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
            document.body.style.overflow = '';
        }
    });
</script>
@endpush
@endsection
