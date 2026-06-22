<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-[32px] sm:text-4xl font-black text-gray-950 tracking-tight mb-3">Lupa Kata Sandi?</h2>
        <p class="text-[15px] sm:text-[16px] text-gray-500 leading-relaxed">
            Tidak masalah. Cukup beri tahu kami alamat email Anda, dan kami akan mengirimkan tautan untuk mereset kata sandi agar Anda dapat membuat yang baru.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email" class="text-sm font-bold text-gray-700 mb-2 block" />
            <x-text-input id="email" class="block w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-[15px] text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-gray-950 focus:border-transparent transition-all shadow-sm" type="email" name="email" :value="old('email')" required autofocus placeholder="Masukkan email yang terdaftar" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-gray-950 hover:bg-gray-800 text-white font-bold text-[15px] py-4 rounded-xl transition-all shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-950">
                Kirim Tautan Reset Kata Sandi
            </button>
        </div>
        
        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <a href="{{ route('login') }}" class="text-[14px] font-semibold text-gray-600 hover:text-gray-950 transition-colors">
                &larr; Kembali ke halaman Login
            </a>
        </div>
    </form>
</x-guest-layout>
