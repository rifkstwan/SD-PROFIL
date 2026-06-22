@extends('public.layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- ═══════════════════════════════════════════════
        HERO SECTION
    ═══════════════════════════════════════════════ --}}
<section class="bg-[#f5f0eb]">
    {{-- Text Row: headline left, description + CTA right --}}
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16 lg:py-20">
        <div class="grid lg:grid-cols-2 gap-10 lg:gap-20 items-start">
            {{-- Left: Big Headline --}}
            <div>
                <h1 class="text-4xl sm:text-5xl lg:text-[52px] font-black text-gray-950 leading-[1.1] tracking-tight">
                    Membentuk generasi yang aktif tumbuh dan berprestasi
                </h1>
            </div>

            {{-- Right: Description + CTA --}}
            <div class="flex flex-col items-start justify-center">
                <p class="text-[15px] text-gray-700 leading-relaxed mb-8">
                    Program pendidikan kami membantu siswa tumbuh secara akademik, sosial, dan personal
                    dalam lingkungan yang mendukung. Melalui pembelajaran yang aktif dan pengalaman nyata,
                    mereka membangun kepercayaan diri dan meraih keberhasilan yang bermakna.
                </p>
                <a href="#kontak"
                    class="inline-block bg-gray-950 text-white text-[14px] font-semibold px-7 py-3.5 hover:bg-gray-800 transition">
                    Lihat Pendaftaran
                </a>
            </div>
        </div>
    </div>

    {{-- Full-width School Building Photo with Glass Stats Overlay --}}
    <div class="relative w-full h-[480px] sm:h-[560px] lg:h-[640px]">
        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=2000&q=80"
            alt="Gedung Sekolah"
            class="w-full h-full object-cover object-center" />

        {{-- Dark gradient at bottom for readability --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

        {{-- Separate Glass Stat Cards --}}
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 w-[calc(100%-3rem)] max-w-5xl">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl px-5 py-4 shadow-xl">
                    <div class="text-3xl lg:text-4xl font-black text-white tracking-tight">25+</div>
                    <div class="text-xs text-white/70 mt-1.5 leading-snug">Tahun Berpengalaman<br>dalam Pendidikan</div>
                </div>
                <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl px-5 py-4 shadow-xl">
                    <div class="text-3xl lg:text-4xl font-black text-white tracking-tight">150+</div>
                    <div class="text-xs text-white/70 mt-1.5 leading-snug">Prestasi &amp;<br>Penghargaan</div>
                </div>
                <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl px-5 py-4 shadow-xl">
                    <div class="text-3xl lg:text-4xl font-black text-white tracking-tight">95%</div>
                    <div class="text-xs text-white/70 mt-1.5 leading-snug">Tingkat Kelulusan<br>Siswa</div>
                </div>
                <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl px-5 py-4 shadow-xl">
                    <div class="text-3xl lg:text-4xl font-black text-white tracking-tight">3000+</div>
                    <div class="text-xs text-white/70 mt-1.5 leading-snug">Alumni<br>Tersebar</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
        STORY & VALUES SECTION
    ═══════════════════════════════════════════════ --}}
<section id="tentang" class="py-16 lg:py-24">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Header Row --}}
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-start mb-10">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight">
                Tentang Kami
            </h2>
            <div class="flex flex-col justify-center">
                <p class="text-[15px] text-gray-600 leading-relaxed">
                    {{ $profile->description ?? 'Berdiri dengan tekad kuat dari para pendidik berdedikasi, sekolah kami hadir dengan misi sederhana: menciptakan lingkungan yang nyaman di mana setiap siswa dapat mengeksplorasi, belajar, dan tumbuh menjadi pribadi terbaik mereka.' }}
                </p>
            </div>
        </div>

        {{-- Value Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            {{-- Card 1: Integritas — text top, image bottom --}}
            <div class="bg-gray-50 rounded-2xl p-5 flex flex-col justify-between min-h-[340px] relative group">
                <div>
                    <h3 class="text-xl font-bold text-gray-950 mb-2">Integritas</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Kami mendorong siswa untuk selalu jujur, bertanggung jawab, dan berani mengambil sikap yang benar dalam setiap situasi.
                    </p>
                </div>
                <div class="mt-4 rounded-xl overflow-hidden h-36">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=600&q=80"
                        alt="Integritas" class="w-full h-full object-cover" />
                </div>
                <a href="#tentang" class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm hover:shadow-md transition">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            {{-- Card 2: Kreativitas — image top, text bottom --}}
            <div class="bg-gray-50 rounded-2xl p-5 flex flex-col justify-between min-h-[340px] relative group">
                <div class="rounded-xl overflow-hidden h-36 mb-4">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80"
                        alt="Kreativitas" class="w-full h-full object-cover" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-950 mb-2">Kreativitas</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Dari seni hingga sains, kami membantu siswa mengekspresikan ide unik mereka dan mewujudkan imajinasi dalam karya nyata setiap harinya.
                    </p>
                </div>
                <a href="#program" class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm hover:shadow-md transition">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            {{-- Card 3: Keunggulan — text top, image bottom --}}
            <div class="bg-gray-50 rounded-2xl p-5 flex flex-col justify-between min-h-[340px] relative group">
                <div>
                    <h3 class="text-xl font-bold text-gray-950 mb-2">Keunggulan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Kami menetapkan standar tinggi dan memberikan dukungan penuh agar setiap siswa dapat meraih prestasi terbaiknya di berbagai bidang.
                    </p>
                </div>
                <div class="mt-4 rounded-xl overflow-hidden h-36">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80"
                        alt="Keunggulan" class="w-full h-full object-cover" />
                </div>
                <a href="#program" class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm hover:shadow-md transition">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            {{-- Card 4: Karakter — image top, text bottom --}}
            <div class="bg-gray-50 rounded-2xl p-5 flex flex-col justify-between min-h-[340px] relative group">
                <div class="rounded-xl overflow-hidden h-36 mb-4">
                    <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=600&q=80"
                        alt="Karakter" class="w-full h-full object-cover" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-950 mb-2">Karakter</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Kami memupuk kepercayaan diri dan kemandirian agar setiap siswa berkembang sesuai potensinya dengan penuh rasa bangga.
                    </p>
                </div>
                <a href="#tentang" class="absolute bottom-4 right-4 w-8 h-8 bg-white rounded-lg flex items-center justify-center shadow-sm hover:shadow-md transition">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
        ACADEMIC PROGRAMS SECTION
    ═══════════════════════════════════════════════ --}}
<section id="program" class="py-16 lg:py-24 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Header Row --}}
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-start mb-12">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight">
                Keunggulan Program Akademik
            </h2>
            <p class="text-[15px] text-gray-600 leading-relaxed self-center">
                Program pendidikan berdampak tinggi yang dirancang untuk menumbuhkan keunggulan melalui
                pembelajaran mendalam, inovasi, dan penerapan dunia nyata.
            </p>
        </div>

        {{-- Program Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

            {{-- Card 1 --}}
            <div class="bg-white rounded-2xl p-7 flex flex-col gap-10 min-h-[260px]">
                <div>
                    <svg class="w-8 h-8 text-gray-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-[18px] font-bold text-gray-950 mb-3 leading-snug">Kurikulum Terintegrasi</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Kurikulum seimbang yang menggabungkan standar nasional dengan perspektif global untuk pengembangan akademik siswa yang menyeluruh.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-2xl p-7 flex flex-col gap-10 min-h-[260px]">
                <div>
                    <svg class="w-8 h-8 text-gray-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-[18px] font-bold text-gray-950 mb-3 leading-snug">Kelas Akselerasi</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Program lanjutan yang dirancang untuk menantang siswa berprestasi dan mempercepat pertumbuhan akademik mereka.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white rounded-2xl p-7 flex flex-col gap-10 min-h-[260px]">
                <div>
                    <svg class="w-8 h-8 text-gray-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-[18px] font-bold text-gray-950 mb-3 leading-snug">Persiapan Jenjang Lanjut</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Bimbingan personal dan dukungan intensif untuk membantu siswa sukses melanjutkan ke jenjang pendidikan lebih tinggi.
                    </p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="bg-white rounded-2xl p-7 flex flex-col gap-10 min-h-[260px]">
                <div>
                    <svg class="w-8 h-8 text-gray-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-[18px] font-bold text-gray-950 mb-3 leading-snug">Pembelajaran Berbasis Proyek</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Pengalaman belajar langsung yang mengembangkan pemikiran kritis melalui proyek nyata dan kolaborasi tim.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
        SCHOOL FACILITIES SECTION
    ═══════════════════════════════════════════════ --}}
<section id="fasilitas" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Two-column outer layout: title left, grid right --}}
        <div class="grid lg:grid-cols-[1fr_3fr] gap-10 lg:gap-16 items-start">

            {{-- Left: Title --}}
            <div class="lg:sticky lg:top-28">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight mb-4">
                    Fasilitas Sekolah
                </h2>
                <p class="text-[15px] text-gray-500 leading-relaxed">
                    Lingkungan belajar yang lengkap dan modern untuk mendukung tumbuh kembang siswa secara optimal di setiap bidang.
                </p>
            </div>

            {{-- Right: 3-column editorial photo grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

                {{-- Col 1: 2 tall images --}}
                <div class="flex flex-col gap-5">
                    <div>
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=800&q=80"
                            alt="Laboratorium Sains"
                            class="w-full h-52 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Laboratorium Sains</p>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1510915361894-db8b60106cb1?auto=format&fit=crop&w=800&q=80"
                            alt="Ruang Seni &amp; Musik"
                            class="w-full h-52 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Ruang Seni &amp; Musik</p>
                    </div>
                </div>

                {{-- Col 2: 2 tall images --}}
                <div class="flex flex-col gap-5">
                    <div>
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80"
                            alt="Perpustakaan"
                            class="w-full h-52 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Perpustakaan</p>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?auto=format&fit=crop&w=800&q=80"
                            alt="Laboratorium Komputer"
                            class="w-full h-52 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Laboratorium Komputer</p>
                    </div>
                </div>

                {{-- Col 3: 2 shorter images (staggered top) --}}
                <div class="flex flex-col gap-5 lg:pt-10">
                    <div>
                        <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80"
                            alt="Lapangan Olahraga"
                            class="w-full h-44 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Lapangan Olahraga</p>
                    </div>
                    <div>
                        <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?auto=format&fit=crop&w=800&q=80"
                            alt="Taman &amp; Area Hijau"
                            class="w-full h-44 object-cover rounded-xl" />
                        <p class="mt-2 text-[11px] font-semibold uppercase tracking-widest text-gray-500">Taman &amp; Area Hijau</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════
        STUDENT ACHIEVEMENTS SECTION
    ═══════════════════════════════════════════════ --}}
<section class="py-16 lg:py-24 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Centered Heading --}}
        <div class="text-center mb-14">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight">
                Prestasi Membanggakan Siswa Kami
            </h2>
        </div>

        {{-- Achievement Cards — 5 columns --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">

            {{-- Card 1: Olimpiade Matematika --}}
            <div class="flex flex-col">
                <div class="rounded-xl overflow-hidden mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&w=600&q=80"
                        alt="Juara 1 Olimpiade Matematika Nasional"
                        class="w-full h-full object-cover" />
                </div>
                <div class="text-center">
                    <h3 class="text-[14px] font-semibold text-gray-950 leading-snug">Juara 1 Olimpiade Matematika Nasional</h3>
                    <p class="text-[12px] text-gray-500 mt-1">Tirta Pratama — 2024</p>
                </div>
            </div>

            {{-- Card 2: Debat Bahasa Inggris --}}
            <div class="flex flex-col">
                <div class="rounded-xl overflow-hidden mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80"
                        alt="Juara 2 Lomba Debat Bahasa Inggris Provinsi"
                        class="w-full h-full object-cover" />
                </div>
                <div class="text-center">
                    <h3 class="text-[14px] font-semibold text-gray-950 leading-snug">Juara 2 Lomba Debat Bahasa Inggris Provinsi</h3>
                    <p class="text-[12px] text-gray-500 mt-1">Karen Alexia — 2025</p>
                </div>
            </div>

            {{-- Card 3: Kompetisi Catur --}}
            <div class="flex flex-col">
                <div class="rounded-xl overflow-hidden mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1774128323231-5e538407bda9?auto=format&fit=crop&w=600&q=80"
                        alt="Juara 1 Kompetisi Catur Nasional"
                        class="w-full h-full object-cover" />
                </div>
                <div class="text-center">
                    <h3 class="text-[14px] font-semibold text-gray-950 leading-snug">Juara 1 Kompetisi Catur Nasional</h3>
                    <p class="text-[12px] text-gray-500 mt-1">Tirta Pratama — 2024</p>
                </div>
            </div>

            {{-- Card 4: Karya Tulis Ilmiah --}}
            <div class="flex flex-col">
                <div class="rounded-xl overflow-hidden mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1761322572550-967ea8c0bfd9?auto=format&fit=crop&w=600&q=80"
                        alt="Juara 3 Lomba Karya Tulis Ilmiah Nasional"
                        class="w-full h-full object-cover" />
                </div>
                <div class="text-center">
                    <h3 class="text-[14px] font-semibold text-gray-950 leading-snug">Juara 3 Lomba Karya Tulis Ilmiah Nasional</h3>
                    <p class="text-[12px] text-gray-500 mt-1">Dewi Wulan — 2022</p>
                </div>
            </div>

            {{-- Card 5: Lari 100m --}}
            <div class="flex flex-col">
                <div class="rounded-xl overflow-hidden mb-4 aspect-[4/5]">
                    <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?auto=format&fit=crop&w=600&q=80"
                        alt="Juara 1 Lari 100m Tingkat Provinsi"
                        class="w-full h-full object-cover" />
                </div>
                <div class="text-center">
                    <h3 class="text-[14px] font-semibold text-gray-950 leading-snug">Juara 1 Lari 100m Tingkat Provinsi</h3>
                    <p class="text-[12px] text-gray-500 mt-1">Rizky Maulana — 2023</p>
                </div>
            </div>

        </div>

        {{-- View Achievements Button --}}
        <div class="text-center mt-12">
            <a href="#"
                class="inline-block border-2 border-gray-950 text-gray-950 text-[14px] font-semibold px-8 py-3 rounded hover:bg-gray-950 hover:text-white transition">
                Lihat Prestasi
            </a>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════
        TESTIMONIALS SECTION
    ═══════════════════════════════════════════════ --}}
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Header Row: title left, description + button right --}}
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-start mb-14">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight">
                Testimoni Orang Tua
            </h2>
            <div class="flex flex-col justify-center">
                <p class="text-[15px] text-gray-600 leading-relaxed mb-5">
                    Dengarkan pengalaman para orang tua siswa yang telah mempercayakan pendidikan putra-putri mereka di sekolah kami.
                </p>
                <a href="#"
                    class="inline-block border-2 border-gray-950 text-gray-950 text-[14px] font-semibold px-7 py-3 rounded hover:bg-gray-950 hover:text-white transition self-start">
                    Baca Semua Testimoni
                </a>
            </div>
        </div>

        {{-- Testimonial Cards --}}
        <div class="grid md:grid-cols-3 gap-8">

            {{-- Card 1 --}}
            <div class="flex flex-col">
                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg"
                        alt="Ibu Sari Dewi"
                        class="w-14 h-14 rounded-lg object-cover shrink-0" />
                    <div>
                        <p class="text-[15px] font-bold text-gray-950">Sari Dewi</p>
                        <p class="text-[12px] text-gray-500">Orang Tua Siswa Kelas 3</p>
                    </div>
                </div>
                <div class="relative pl-8">
                    <span class="absolute left-0 top-0 text-5xl font-serif text-gray-200 leading-none select-none">&ldquo;</span>
                    <p class="text-[14px] text-gray-600 leading-relaxed">
                        Sekolah ini memberikan fondasi akademik yang kuat dan lingkungan belajar yang disiplin untuk anak saya. Bimbingan dari guru-guru yang penuh dedikasi sangat berperan dalam membentuk karakter dan rasa percaya dirinya.
                    </p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="flex flex-col">
                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg"
                        alt="Ibu Ratna Handayani"
                        class="w-14 h-14 rounded-lg object-cover shrink-0" />
                    <div>
                        <p class="text-[15px] font-bold text-gray-950">Ratna Handayani</p>
                        <p class="text-[12px] text-gray-500">Orang Tua Siswa Kelas 5</p>
                    </div>
                </div>
                <div class="relative pl-8">
                    <span class="absolute left-0 top-0 text-5xl font-serif text-gray-200 leading-none select-none">&ldquo;</span>
                    <p class="text-[14px] text-gray-600 leading-relaxed">
                        Pengalaman anak saya bersekolah di sini sangat menyenangkan dan penuh perkembangan. Penekanan pada keunggulan akademik dan integritas membuat saya yakin ia mendapat pendidikan terbaik untuk masa depannya.
                    </p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="flex flex-col">
                <div class="flex items-center gap-4 mb-5">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg"
                        alt="Bapak Budi Santoso"
                        class="w-14 h-14 rounded-lg object-cover shrink-0" />
                    <div>
                        <p class="text-[15px] font-bold text-gray-950">Budi Santoso</p>
                        <p class="text-[12px] text-gray-500">Orang Tua Siswa Kelas 6</p>
                    </div>
                </div>
                <div class="relative pl-8">
                    <span class="absolute left-0 top-0 text-5xl font-serif text-gray-200 leading-none select-none">&ldquo;</span>
                    <p class="text-[14px] text-gray-600 leading-relaxed">
                        Fasilitas sekolah lengkap dan terawat dengan baik. Program ekstrakurikuler yang beragam membantu anak saya menemukan bakat dan minatnya. Saya sangat merekomendasikan sekolah ini untuk keluarga lainnya.
                    </p>
                </div>
            </div>

        </div>

        {{-- Carousel Dots --}}
        <div class="flex items-center justify-center gap-2 mt-12">
            <span class="w-2.5 h-2.5 rounded-full bg-gray-950"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════
        LATEST NEWS SECTION
    ═══════════════════════════════════════════════ --}}
<section class="py-16 lg:py-24 bg-[#f5f0eb]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Header Row --}}
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-start mb-12">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight">
                Berita Terbaru
            </h2>
            <div class="flex flex-col justify-center">
                <p class="text-[15px] text-gray-600 leading-relaxed mb-5">
                    Ikuti perkembangan kegiatan dan informasi terbaru dari sekolah kami.
                </p>
                <a href="{{ route('berita.index') }}"
                    class="inline-block border-2 border-gray-950 text-gray-950 text-[14px] font-semibold px-7 py-3 rounded hover:bg-gray-950 hover:text-white transition self-start">
                    Lihat Semua Berita
                </a>
            </div>
        </div>

        @if($latestNews->count())

        {{-- Top Row: Featured (overlay) + Tall Standard --}}
        <div class="grid md:grid-cols-2 gap-4 mb-4">
            @foreach($latestNews as $index => $item)
            @if($index === 0)
            {{-- Featured Card: dark overlay with white text on image --}}
            <a href="{{ route('berita.show', $item->slug) }}"
                class="group relative overflow-hidden rounded-xl h-[340px] lg:h-[400px]">
                @if($item->thumbnail)
                <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                @else
                <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-8">
                    <p class="text-xs text-white/60 mb-3">
                        {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}
                    </p>
                    <h3 class="text-xl lg:text-2xl font-bold text-white leading-snug mb-2">
                        {{ $item->title }}
                    </h3>
                    <p class="text-sm text-white/70 leading-relaxed line-clamp-2">
                        {{ Str::limit(strip_tags($item->content), 120) }}
                    </p>
                </div>
            </a>
            @endif

            @if($index === 1)
            {{-- Tall Standard Card --}}
            <a href="{{ route('berita.show', $item->slug) }}"
                class="group overflow-hidden rounded-xl bg-white hover:shadow-lg transition-shadow h-[340px] lg:h-[400px] flex flex-col">
                <div class="relative flex-1 overflow-hidden">
                    @if($item->thumbnail)
                    <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    @endif
                    <span class="absolute top-3 left-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded">
                        {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}
                    </span>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-950 text-[15px] leading-snug mb-1 group-hover:text-gray-600 transition line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                </div>
            </a>
            @endif
            @endforeach
        </div>

        {{-- Bottom Row: 3 standard cards --}}
        <div class="grid md:grid-cols-3 gap-4">
            @foreach($latestNews as $index => $item)
            @if($index >= 2)
            <a href="{{ route('berita.show', $item->slug) }}"
                class="group overflow-hidden rounded-xl bg-white hover:shadow-lg transition-shadow flex flex-col">
                <div class="relative h-48 overflow-hidden">
                    @if($item->thumbnail)
                    <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    @endif
                    <span class="absolute top-3 left-3 bg-black/60 text-white text-xs px-2.5 py-1 rounded">
                        {{ $item->published_at ? $item->published_at->format('d M Y') : '' }}
                    </span>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-950 text-[15px] leading-snug mb-1 group-hover:text-gray-600 transition line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                </div>
            </a>
            @endif
            @endforeach
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

{{-- ═══════════════════════════════════════════════
        REGISTRATION / CONTACT SECTION
    ═══════════════════════════════════════════════ --}}
<section id="kontak" class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Section Header — Centered --}}
        <div class="text-center mb-14">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight mb-4">
                Siap Bergabung dengan Keluarga Besar Kami?
            </h2>
            <p class="text-[15px] text-gray-600 leading-relaxed max-w-2xl mx-auto">
                Pendaftaran siswa baru tahun ajaran 2026/2027 telah dibuka. Hubungi kami untuk informasi lebih lanjut mengenai proses pendaftaran, biaya, dan jadwal kunjungan sekolah.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">

            {{-- Left Column — Registration Form --}}
            <div class="bg-gray-50 rounded-2xl p-8 lg:p-10">
                <h3 class="text-xl font-bold text-gray-950 mb-6">Formulir Pendaftaran Siswa Baru</h3>
                
                @if(session('success'))
                    <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-xl text-sm font-medium border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Orang Tua</label>
                        <input type="text" name="parent_name" required
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:border-transparent transition"
                            placeholder="Nama lengkap Anda" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Calon Siswa</label>
                        <input type="text" name="student_name" required
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:border-transparent transition"
                            placeholder="Nama lengkap calon siswa" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Kelas yang Dituju</label>
                            <select name="grade"
                                class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:border-transparent transition">
                                <option value="">Pilih Kelas</option>
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                                <option value="4">Kelas 4</option>
                                <option value="5">Kelas 5</option>
                                <option value="6">Kelas 6</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nomor Telepon</label>
                            <input type="tel" name="phone" required
                                class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:border-transparent transition"
                                placeholder="08xx-xxxx-xxxx" />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Pesan / Pertanyaan</label>
                        <textarea name="message" rows="4"
                            class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-950 focus:border-transparent transition resize-none"
                            placeholder="Tulis pesan atau pertanyaan Anda"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-gray-950 text-white text-[14px] font-semibold py-3.5 rounded-xl hover:bg-gray-800 transition">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>

            {{-- Right Column — Direct Contact Info + Map --}}
            <div class="flex flex-col gap-6">
                <div class="bg-[#f5f0eb] rounded-2xl p-8">
                    <h3 class="text-xl font-bold text-gray-950 mb-6">Hubungi Kami Langsung</h3>
                    <div class="space-y-5">
                        @if($profile && $profile->phone)
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.613.613l4.458-1.495A11.952 11.952 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.387 0-4.594-.826-6.326-2.207l-.446-.353-3.16 1.06 1.06-3.16-.353-.446A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0.5">WhatsApp</p>
                                <p class="text-sm font-semibold text-gray-950">{{ $profile->phone }}</p>
                            </div>
                        </div>
                        @endif
                        @if($profile && $profile->email)
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0.5">Email</p>
                                <p class="text-sm font-semibold text-gray-950">{{ $profile->email }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 mb-0.5">Jam Operasional</p>
                                <p class="text-sm font-semibold text-gray-950">Senin – Jumat, 07:00 – 15:00</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3 mt-8">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone ?? '') }}" target="_blank"
                            class="inline-flex items-center gap-2 bg-green-600 text-white text-[13px] font-semibold px-5 py-2.5 rounded-xl hover:bg-green-500 transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                <path d="M12 0C5.373 0 0 5.373 0 12c0 2.625.846 5.059 2.284 7.034L.789 23.492a.5.5 0 00.613.613l4.458-1.495A11.952 11.952 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.387 0-4.594-.826-6.326-2.207l-.446-.353-3.16 1.06 1.06-3.16-.353-.446A9.935 9.935 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                            </svg>
                            Hubungi via WhatsApp
                        </a>
                        <a href="mailto:{{ $profile->email ?? '' }}"
                            class="inline-flex items-center gap-2 border-2 border-gray-950 text-gray-950 text-[13px] font-semibold px-5 py-2.5 rounded-xl hover:bg-gray-950 hover:text-white transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Kirim Email
                        </a>
                    </div>
                </div>

                {{-- Map / School Location Card --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden">
                    <div class="h-48 bg-gray-200 relative">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sid!2sid!4v1000000000000!5m2!1sid!2sid"
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @if($profile && $profile->address)
                    <div class="p-5">
                        <p class="text-xs text-gray-500 mb-1">Kunjungi Sekolah Kami</p>
                        <p class="text-sm font-semibold text-gray-950 leading-snug">{{ $profile->address }}</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

@endsection