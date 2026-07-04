@extends('layouts.frontend')

@if (session('success_register'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Registrasi Berhasil!',
            text: 'Akun Anda telah terdaftar. Silakan menunggu konfirmasi dari admin.',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#2563eb'
        });
    </script>
@endif

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950/60 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 dark:border-slate-800 rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
        
        <div class="hidden md:flex flex-col justify-between p-10 bg-gradient-to-br from-blue-600 to-blue-700 text-white relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute left-10 top-20 w-24 h-24 bg-sky-400/20 rounded-full blur-xl"></div>

            <div class="z-10">
                <a href="{{ route('home') }}" class="text-lg font-black tracking-tight flex items-center gap-2">
                    <span>✨</span> SkillStore
                </a>
            </div>

            <div class="z-10 my-auto space-y-3">
                <h2 class="text-xl font-black leading-tight tracking-tight">Selamat Datang Kembali!</h2>
                <p class="text-[11px] text-blue-100 leading-relaxed">Masuk ke akunmu untuk melanjutkan pengembangan portofolio, memantau unduhan source code, atau mempublikasikan project inovatif terbaru milikmu.</p>
            </div>

            <div class="z-10 text-[10px] text-blue-200/80 font-medium">
                &copy; 2026 SkillStore. All rights reserved.
            </div>
        </div>

        <div class="p-8 sm:p-10 flex flex-col justify-center">
    <div class="mb-6">
        <h3 class="text-lg font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight">Masuk ke Akun</h3>
        <p class="text-xs text-slate-400 mt-1">Gunakan kredensial akun yang sudah terdaftar sebelumnya.</p>
    </div>

    @if (session('status'))
        <div class="mb-4 p-3 bg-emerald-50 border border-emerald-100 text-emerald-600 dark:bg-emerald-950/30 dark:border-emerald-900/50 dark:text-emerald-400 text-xs font-semibold rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Alamat Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="name@example.com"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
            @error('email')
                <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-[11px] font-medium text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
            <input type="password" name="password" id="password" required autocomplete="current-password" placeholder="••••••••"
                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
            @error('password')
                <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-200 dark:border-slate-700 dark:bg-slate-900 text-blue-600 focus:ring-blue-500/20 transition cursor-pointer">
                <span class="ms-2 text-[11px] font-semibold text-slate-500 dark:text-slate-400 transition-colors duration-300 select-none">Ingat saya di perangkat ini</span>
            </label>
        </div>

        <div class="pt-2 space-y-4">
            <button type="submit" class="flex items-center justify-center w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40 transform hover:-translate-y-0.5 duration-150">
                Masuk Sekarang
            </button>
            
            <div class="text-center border-t border-slate-100 dark:border-slate-800 pt-4">
                <a class="text-[11px] font-medium text-slate-400 hover:text-blue-600 transition" href="{{ route('register') }}">
                    Belum punya akun? <span class="font-bold text-blue-500 underline">Daftar di sini</span>
                </a>
            </div>
        </div>
    </form>
</div>

    </div>
</div>
@endsection