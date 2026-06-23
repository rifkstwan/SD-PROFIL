<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-10">
        <h2 class="text-[32px] sm:text-4xl font-black text-gray-950 tracking-tight mb-2">Selamat Datang,</h2>
        <p class="text-[15px] sm:text-[16px] text-gray-500 leading-relaxed">Silakan login untuk mengakses portal manajemen sekolah SDN NGADIRGO 02.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Alamat Email" class="text-sm font-bold text-gray-700 mb-2 block" />
            <x-text-input id="email" class="block w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-[15px] text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-gray-950 focus:border-transparent transition-all shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <x-input-label for="password" value="Kata Sandi" class="text-sm font-bold text-gray-700 block" />
            </div>

            <div class="relative" x-data="{ showPassword: false }">
                <x-text-input id="password" class="block w-full px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-[15px] text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-gray-950 focus:border-transparent transition-all shadow-sm"
                                x-bind:type="showPassword ? 'text' : 'password'"
                                name="password"
                                required autocomplete="current-password" placeholder="Masukkan kata sandi" />
                
                {{-- Toggle Eye Icon --}}
                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors">
                    {{-- Eye Icon (Show) --}}
                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    {{-- Eye Slash Icon (Hide) --}}
                    <svg x-show="showPassword" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            
            <div class="flex justify-end mt-2">
                @if (Route::has('password.request'))
                    <a class="text-[13px] font-semibold text-gray-500 hover:text-gray-950 transition-colors" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-gray-950 hover:bg-gray-800 text-white font-bold text-[15px] py-4 rounded-xl transition-all shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-950">
                Masuk ke Portal
            </button>
        </div>
    </form>
</x-guest-layout>
