<section>
    <header class="mb-6">
        <h2 class="text-sm font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider">
            {{ __('Informasi Akun Dasar') }}
        </h2>
        <p class="mt-1 text-xs text-slate-400">
            {{ __('Perbarui nama pengguna dan alamat email utama yang terdaftar pada sistem.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                Nama Pengguna <span class="text-rose-500">*</span>
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                   class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('name') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition">
            @error('name')
                <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                Alamat Email <span class="text-rose-500">*</span>
            </label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                   class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('email') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition">
            @error('email')
                <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-amber-50 border border-amber-100 rounded-xl">
                    <p class="text-[11px] font-medium text-amber-800 flex flex-wrap items-center gap-1">
                        🚨 {{ __('Alamat email Anda belum terverifikasi.') }}
                        <button form="send-verification" class="font-bold underline text-amber-900 hover:text-amber-700 transition">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-1.5 font-bold text-[10px] text-emerald-600">
                            ✨ {{ __('Tautan verifikasi baru telah dikirim ke email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" 
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm dark:border-slate-800 shadow-blue-500/10">
                💾 {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)"
                     class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-100">
                    ✓ {{ __('Berhasil disimpan.') }}
                </div>
            @endif
        </div>
    </form>
</section>