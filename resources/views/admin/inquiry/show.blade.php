@extends('admin.layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Detail Pesan Masuk</h2>
        <p class="text-sm text-gray-500 mt-1">Melihat rincian pendaftaran dan pertanyaan.</p>
    </div>
    <a href="{{ route('admin.inquiries.index') }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-600 hover:text-gray-900 hover:bg-gray-50 px-4 py-2.5 rounded-xl text-sm font-semibold shadow-sm transition-colors active:scale-95">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl">
    <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between bg-gray-50/50">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#ff6b35] to-[#f54200] flex items-center justify-center text-white shadow-inner font-bold text-lg">
                {{ strtoupper(substr($inquiry->parent_name, 0, 1)) }}
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">{{ $inquiry->parent_name }}</h3>
                <p class="text-sm text-gray-500">{{ $inquiry->phone }}</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-sm font-medium text-gray-900">{{ $inquiry->created_at->format('d M Y') }}</p>
            <p class="text-xs text-gray-500 mt-0.5">{{ $inquiry->created_at->format('H:i') }}</p>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Calon Siswa</p>
                <p class="text-base font-medium text-gray-900">{{ $inquiry->student_name }}</p>
            </div>
            <div class="bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Kelas yang Dituju</p>
                @if($inquiry->grade)
                    <span class="inline-flex items-center py-1 px-2.5 rounded-md text-sm font-semibold bg-blue-50 text-blue-600 border border-blue-100 mt-1">
                        Kelas {{ $inquiry->grade }}
                    </span>
                @else
                    <p class="text-base font-medium text-gray-500">-</p>
                @endif
            </div>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                Pesan / Pertanyaan:
            </p>
            <div class="bg-gray-50 p-5 rounded-xl border border-gray-100 min-h-[120px]">
                @if($inquiry->message)
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $inquiry->message }}</p>
                @else
                    <p class="text-gray-400 italic text-sm">Tidak ada pesan tambahan yang disertakan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
