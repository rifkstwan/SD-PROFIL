@extends('public.layouts.app')

@section('title', 'Profil Guru')

@section('content')
<section class="py-16 lg:py-24 bg-[#f5f0eb] min-h-screen">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Page Header --}}
        <div class="mb-12">
            <h1 class="text-4xl lg:text-5xl font-black text-gray-950 leading-tight tracking-tight mb-3">
                Tenaga Pengajar Kami
            </h1>
            <p class="text-[15px] text-gray-600 leading-relaxed max-w-2xl">
                Didukung oleh guru-guru profesional dan berdedikasi yang siap membimbing putra-putri Anda meraih prestasi terbaik.
            </p>
        </div>

        {{-- Teacher Cards Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Card 1 --}}
            <div class="bg-white rounded-2xl overflow-hidden group">
                <div class="aspect-[4/5] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                        alt="Ibu Sari Dewi, S.Pd."
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-5">
                    <h3 class="text-[15px] font-bold text-gray-950 leading-snug">Ibu Sari Dewi, S.Pd.</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-3">Kepala Sekolah & Guru Kelas 6</p>
                    <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
                        Berpengalaman lebih dari 15 tahun dalam dunia pendidikan dasar dengan fokus pada pengembangan karakter siswa.
                    </p>
                    <span class="inline-block bg-gray-950 text-white text-[11px] font-semibold px-3 py-1.5 rounded-lg">
                        Guru Berpengalaman
                    </span>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-2xl overflow-hidden group">
                <div class="aspect-[4/5] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&w=600&q=80"
                        alt="Bapak Ahmad Hidayat, M.Pd."
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-5">
                    <h3 class="text-[15px] font-bold text-gray-950 leading-snug">Bapak Ahmad Hidayat, M.Pd.</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-3">Guru Matematika & IPA</p>
                    <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
                        Lulusan terbaik Universitas Negeri Jakarta dengan spesialisasi metode pembelajaran matematika interaktif.
                    </p>
                    <span class="inline-block bg-gray-950 text-white text-[11px] font-semibold px-3 py-1.5 rounded-lg">
                        Guru Berpengalaman
                    </span>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white rounded-2xl overflow-hidden group">
                <div class="aspect-[4/5] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1580894732444-8ecded7900cd?auto=format&fit=crop&w=600&q=80"
                        alt="Ibu Ratna Kusuma, S.Pd."
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-5">
                    <h3 class="text-[15px] font-bold text-gray-950 leading-snug">Ibu Ratna Kusuma, S.Pd.</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-3">Guru Bahasa Indonesia & Seni Budaya</p>
                    <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
                        Aktif membimbing siswa dalam kegiatan literasi dan pentas seni budaya sekolah setiap tahunnya.
                    </p>
                    <span class="inline-block bg-gray-950 text-white text-[11px] font-semibold px-3 py-1.5 rounded-lg">
                        Guru Berpengalaman
                    </span>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="bg-white rounded-2xl overflow-hidden group">
                <div class="aspect-[4/5] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=600&q=80"
                        alt="Bapak Dedi Setiawan, S.Or."
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>
                <div class="p-5">
                    <h3 class="text-[15px] font-bold text-gray-950 leading-snug">Bapak Dedi Setiawan, S.Or.</h3>
                    <p class="text-xs text-gray-500 mt-1 mb-3">Guru Olahraga & Pembina Ekskul</p>
                    <p class="text-sm text-gray-600 leading-relaxed line-clamp-3 mb-4">
                        Mantan atlet nasional yang kini aktif membina siswa di bidang olahraga dan kegiatan ekstrakurikuler.
                    </p>
                    <span class="inline-block bg-gray-950 text-white text-[11px] font-semibold px-3 py-1.5 rounded-lg">
                        Guru Berpengalaman
                    </span>
                </div>
            </div>

        </div>

        {{-- Testimonial Section --}}
        <div class="mt-20">
            <div class="max-w-3xl mx-auto text-center">
                {{-- Quote Block --}}
                <div class="relative">
                    {{-- Left Quote Mark --}}
                    <span class="absolute -left-4 top-0 text-5xl text-gray-400 font-serif leading-none">&ldquo;</span>
                    {{-- Right Quote Mark --}}
                    <span class="absolute -right-4 bottom-0 text-5xl text-gray-400 font-serif leading-none">&rdquo;</span>

                    <p class="text-[15px] text-gray-700 leading-relaxed px-8 py-4">
                        Setiap anak memiliki potensi unik yang perlu dieksplorasi dan dikembangkan. Kami berkomitmen menciptakan lingkungan belajar yang menyenangkan dan bermakna, agar setiap siswa dapat meraih prestasi terbaik mereka dan tumbuh menjadi pribadi yang berkarakter.
                    </p>
                </div>

                {{-- Avatar & Attribution --}}
                <div class="mt-8 flex flex-col items-center">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80"
                        alt="Ibu Sari Dewi, S.Pd."
                        class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-md" />
                    <h4 class="mt-3 text-[15px] font-bold text-gray-950">Ibu Sari Dewi, S.Pd.</h4>
                    <p class="text-xs text-gray-500">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection