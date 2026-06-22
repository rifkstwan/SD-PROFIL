@extends('admin.layouts.app')

@section('title', 'Pesan Masuk')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Pesan Pendaftaran</h2>
        <p class="text-sm text-gray-500 mt-1">Kelola pesan dan pendaftaran siswa baru dari pengunjung website.</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/80 border-b border-gray-100">
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">Status</th>
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengirim / Orang Tua</th>
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Calon Siswa</th>
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="py-4 px-5 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($inquiries as $inquiry)
                <tr class="hover:bg-gray-50/50 transition-colors {{ !$inquiry->is_read ? 'bg-orange-50/30' : '' }}">
                    <td class="py-4 px-5">
                        @if(!$inquiry->is_read)
                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-[10px] font-bold bg-orange-100 text-orange-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span> Baru
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 py-1 px-2.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-500">
                                Terbaca
                            </span>
                        @endif
                    </td>
                    <td class="py-4 px-5">
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-gray-900">{{ $inquiry->parent_name }}</span>
                            <span class="text-xs text-gray-500 mt-0.5">{{ $inquiry->phone }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-5 text-sm text-gray-900 font-medium">{{ $inquiry->student_name }}</td>
                    <td class="py-4 px-5">
                        @if($inquiry->grade)
                            <span class="inline-flex items-center py-1 px-2.5 rounded-md text-[11px] font-semibold bg-blue-50 text-blue-600 border border-blue-100">
                                Kelas {{ $inquiry->grade }}
                            </span>
                        @else
                            <span class="text-xs text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-5">
                        <div class="flex flex-col">
                            <span class="text-sm text-gray-900">{{ $inquiry->created_at->format('d M Y') }}</span>
                            <span class="text-xs text-gray-400 mt-0.5">{{ $inquiry->created_at->format('H:i') }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-5 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-600 hover:bg-[#ff6b35] hover:text-white transition-colors" title="Lihat Detail">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-12 text-center">
                        <div class="flex flex-col items-center justify-center text-gray-400">
                            <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                            <p class="text-sm font-medium text-gray-500">Belum ada pesan masuk.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($inquiries->hasPages())
    <div class="px-5 py-4 border-t border-gray-50">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
