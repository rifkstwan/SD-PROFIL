@extends('admin.layouts.app')

@section('title', 'Tambah Akun Baru')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors mb-4">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Kembali ke Daftar Akun
    </a>
    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Buat Akun Baru</h2>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <form method="POST" action="{{ route('admin.users.store') }}" class="p-6 sm:p-8">
        @csrf

        <div class="space-y-6">
            {{-- Nama Lengkap --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap staf"
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                       @error('name') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                @error('name')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@sd.sch.id"
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                       @error('email') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                @error('email')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Password --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Kata Sandi <span class="text-red-500">*</span></label>
                    <input type="password" name="password" placeholder="Minimal 8 karakter"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all
                           @error('password') border-red-500 bg-red-50 focus:ring-red-500/50 focus:border-red-500 @enderror">
                    @error('password')<p class="text-red-500 text-xs font-medium mt-1.5">{{ $message }}</p>@enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="block text-sm font-bold text-gray-900 mb-2">Konfirmasi Sandi <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" placeholder="Ketik ulang sandi"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all">
                </div>
            </div>

            {{-- Role --}}
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-2">Peran Hak Akses (Role)</label>
                <div class="relative">
                    <select name="role"
                        class="w-full appearance-none bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-[#ff6b35]/50 focus:border-[#ff6b35] transition-all cursor-pointer">
                        <option value="staf" {{ old('role') === 'staf' ? 'selected' : '' }}>Staf Utama (Manajemen Konten)</option>
                        <option value="super_admin" {{ old('role') === 'super_admin' ? 'selected' : '' }}>Super Admin (Akses Penuh)</option>
                    </select>
                    <svg class="w-4 h-4 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
            <a href="{{ route('admin.users.index') }}" class="inline-flex justify-center items-center px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex justify-center items-center gap-2 bg-[#ff6b35] hover:bg-[#e85b25] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm shadow-orange-500/20 transition-all active:scale-95">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan & Daftarkan Akun
            </button>
        </div>
    </form>
</div>
@endsection