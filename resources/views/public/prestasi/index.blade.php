@extends('public.layouts.app')

@section('title', 'Prestasi Membanggakan')

@section('content')
<div class="bg-[#f5f0eb] min-h-screen pb-24">
    <section class="pt-32 pb-8 lg:pb-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 mb-12">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-center">
                <h1 class="text-3xl sm:text-4xl lg:text-6xl font-semibold text-gray-950 leading-tight">
                    Prestasi Membanggakan<br>
                    <span class="font-black tracking-tight text-4xl sm:text-5xl lg:text-7xl">siswa kami</span>
                </h1>
                <div class="flex flex-col justify-center lg:pl-10">
                    <p class="text-[16px] text-gray-500 leading-relaxed">
                        Kami sangat bangga dengan pencapaian gemilang yang telah diraih oleh siswa-siswi kami dalam berbagai bidang kompetisi. Semangat pantang menyerah adalah kunci keberhasilan mereka.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        @if($prestasiList->isEmpty())
            <div class="text-center py-20 bg-white rounded-[2rem] shadow-sm">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Prestasi</h3>
                <p class="text-gray-500">Data prestasi siswa belum ditambahkan.</p>
            </div>
        @else
        {{-- Featured Achievement Card --}}
        <div class="relative w-full h-[320px] sm:h-[450px] md:h-[500px] lg:h-[600px] rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-500 mb-16 lg:mb-20 group" id="featured-container">
            <img src="{{ Str::startsWith($prestasiList[0]->image, 'http') ? $prestasiList[0]->image : Storage::url($prestasiList[0]->image) }}" id="featured-img"
                 alt="Featured Prestasi" 
                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            
            {{-- Transparent Gradient overlay for text readability --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
            
            {{-- Content Overlay --}}
            <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-10 lg:p-16">
                <div class="max-w-4xl relative z-10">
                    <div class="flex flex-wrap gap-3 items-center mb-5 md:mb-6 transition-opacity duration-500" id="fade-wrapper-1">
                        <span class="px-4 py-1.5 bg-[#f5f0eb] text-gray-950 text-[13px] font-bold rounded-full tracking-wide" id="dynamic-category">
                            {{ $prestasiList[0]->category }}
                        </span>
                    </div>
                    
                    <h3 class="text-2xl sm:text-4xl lg:text-5xl xl:text-6xl font-semibold text-white leading-tight transition-opacity duration-500 mb-2">
                        <span id="dynamic-title-1">{{ $prestasiList[0]->title_line1 }}</span><br>
                        <span class="font-black" id="dynamic-title-2">{{ $prestasiList[0]->title_line2 }}</span>
                    </h3>

                    <p class="text-[14px] lg:text-[15px] font-medium text-[#fbbf24] mb-5 md:mb-6 transition-opacity duration-500" id="dynamic-subtitle">
                        Diraih oleh: <strong>{{ $prestasiList[0]->student_name }}</strong> ({{ $prestasiList[0]->date }})
                    </p>
                    
                    <p class="text-[14px] lg:text-[16px] text-gray-200 leading-relaxed transition-opacity duration-500 max-w-3xl" id="dynamic-desc">
                        {{ $prestasiList[0]->description }}
                    </p>
                </div>
            </div>
        </div>

        @if($prestasiList->count() > 1)
        {{-- Section: Prestasi Lainnya (Grid) --}}
        <div class="text-center max-w-3xl mx-auto mb-14 mt-12 lg:mt-20">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-950 mb-5">Prestasi Kami Lainnya</h2>
            <p class="text-[15px] lg:text-[16px] text-gray-600 leading-relaxed">
                Dedikasi dan kerja keras siswa kami terus membuahkan hasil. Bersama-sama, kita ciptakan sejarah dan wujudkan visi menjadi nyata melalui berbagai pencapaian gemilang.
            </p>
        </div>

        {{-- Grid Items --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-8" id="prestasi-grid">
            @foreach($prestasiList as $index => $prestasi)
            {{-- Skip the first item (it's featured) --}}
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden cursor-pointer group flex flex-col {{ $index === 0 ? 'hidden' : '' }}" 
                 data-prestasi="{{ json_encode([
                     'title_line1' => $prestasi->title_line1,
                     'title_line2' => $prestasi->title_line2,
                     'title' => $prestasi->title,
                     'description' => $prestasi->description,
                     'category' => $prestasi->category,
                     'student_name' => $prestasi->student_name,
                     'date' => $prestasi->date,
                     'image_url' => Str::startsWith($prestasi->image, 'http') ? $prestasi->image : Storage::url($prestasi->image)
                 ]) }}"
                 data-index="{{ $index }}"
                 onclick="swapPrestasi(this)">
                
                <div class="relative overflow-hidden aspect-[4/3] sm:aspect-square lg:aspect-[4/5]">
                    <img src="{{ Str::startsWith($prestasi->image, 'http') ? $prestasi->image : Storage::url($prestasi->image) }}" 
                         alt="{{ $prestasi->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    
                    {{-- Overlay Icon --}}
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center text-gray-900 shadow-lg transform scale-50 group-hover:scale-100 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-[17px] font-bold text-gray-950 mb-1.5 line-clamp-2 group-hover:text-gray-600 transition-colors">{{ $prestasi->title }}</h3>
                    <p class="text-[13px] text-gray-500 font-medium">{{ $prestasi->student_name }} &mdash; {{ $prestasi->date }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- View All Button --}}
        <div class="text-center mt-14">
            <button class="inline-block px-10 py-3.5 bg-white hover:bg-gray-950 text-gray-950 hover:text-white font-bold rounded-full transition-all shadow-sm hover:shadow-md border border-gray-200 hover:border-gray-950">
                Lihat Semua Prestasi
            </button>
        </div>
        @endif
        
        @endif
    </div>
</div>

@push('scripts')
<script>
    function swapPrestasi(element) {
        // Parse data from clicked element
        const newData = JSON.parse(element.getAttribute('data-prestasi'));
        const newIndex = element.getAttribute('data-index');

        // Elements to update
        const featuredImg = document.getElementById('featured-img');
        const dynamicTitle1 = document.getElementById('dynamic-title-1');
        const dynamicTitle2 = document.getElementById('dynamic-title-2');
        const dynamicSubtitle = document.getElementById('dynamic-subtitle');
        const dynamicDesc = document.getElementById('dynamic-desc');
        const dynamicCat = document.getElementById('dynamic-category');
        const fadeWrapper1 = document.getElementById('fade-wrapper-1');

        // Array of elements to apply fade out
        const fadeElements = [featuredImg, dynamicTitle1, dynamicTitle2, dynamicSubtitle, dynamicDesc, fadeWrapper1];
        
        // Add fade out effect
        fadeElements.forEach(el => {
            el.classList.add('opacity-0');
        });

        // Wait for the CSS transition (500ms) to complete before swapping data
        setTimeout(() => {
            // Update content after fade out
            featuredImg.src = newData.image_url;
            dynamicTitle1.textContent = newData.title_line1;
            dynamicTitle2.textContent = newData.title_line2;
            dynamicSubtitle.innerHTML = `Diraih oleh: <strong>${newData.student_name}</strong> (${newData.date})`;
            dynamicDesc.textContent = newData.description;
            dynamicCat.textContent = newData.category;

            // Manage grid items visibility: hide the clicked one, show the rest
            const gridItems = document.querySelectorAll('#prestasi-grid > div');
            gridItems.forEach(item => {
                if (item.getAttribute('data-index') === newIndex) {
                    item.classList.add('hidden');
                } else {
                    item.classList.remove('hidden');
                }
            });

            // Fade back in
            fadeElements.forEach(el => {
                el.classList.remove('opacity-0');
            });

            // Smooth scroll to the featured image container
            document.getElementById('featured-container').scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

        }, 500); 
    }
</script>
@endpush
@endsection
