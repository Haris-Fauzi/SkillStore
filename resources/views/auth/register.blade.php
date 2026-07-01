@extends('layouts.frontend')

@section('content')
<div class="min-h-[85vh] bg-slate-50/60 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full bg-white border border-slate-100 rounded-3xl shadow-xl shadow-slate-100/40 overflow-hidden grid grid-cols-1 md:grid-cols-2">
        
        <div class="hidden md:flex flex-col justify-between p-10 bg-gradient-to-br from-blue-600 to-blue-700 text-white relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute left-10 top-20 w-24 h-24 bg-sky-400/20 rounded-full blur-xl"></div>

            <div class="z-10">
                <a href="{{ route('home') }}" class="text-lg font-black tracking-tight flex items-center gap-2">
                    <span>✨</span> SkillStore
                </a>
            </div>

            <div class="z-10 my-auto space-y-3">
                <h2 class="text-xl font-black leading-tight tracking-tight">Merangkai Solusi, Mewujudkan Visi Generasi.</h2>
                <p class="text-[11px] text-blue-100 leading-relaxed">Publikasikan portfolio project terbaikmu, bangun reputasi digital, dan buka peluang karier lebih luas bersama lulusan SMK hebat lainnya.</p>
            </div>

            <div class="z-10 text-[10px] text-blue-200/80 font-medium">
                &copy; 2026 SkillStore. All rights reserved.
            </div>
        </div>

        <div class="p-8 sm:p-10 flex flex-col justify-center">
            <div class="mb-6">
                <h3 class="text-lg font-black text-slate-900 tracking-tight">Mulai Perjalananmu</h3>
                <p class="text-xs text-slate-400 mt-1">Buat akun barumu untuk mulai mempublikasikan karya hebatmu.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="identity_number" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Identitas (NIS/NIP)</label>
                    <input type="text" name="identity_number" id="identity_number" value="{{ old('identity_number') }}" required autofocus autocomplete="off" placeholder="Masukkan nomor induk siswa/guru"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition text-xs font-medium text-slate-800 placeholder-slate-300">
                    @error('identity_number')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama lengkap sesuai ijazah"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition text-xs font-medium text-slate-800 placeholder-slate-300">
                    @error('name')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition text-xs font-medium text-slate-800 placeholder-slate-300">
                    @error('email')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="password" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Password</label>
                        <input type="password" name="password" id="password" required autocomplete="new-password" placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition text-xs font-medium text-slate-800 placeholder-slate-300">
                        @error('password')
                            <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition text-xs font-medium text-slate-800 placeholder-slate-300">
                        @error('password_confirmation')
                            <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-2 space-y-3">
                    <button type="submit" class="flex items-center justify-center w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-md shadow-blue-500/10">
                        Daftar Akun Baru
                    </button>
                    
                    <div class="text-center">
                        <a class="text-[11px] font-medium text-slate-400 hover:text-blue-600 transition" href="{{ route('login') }}">
                            Sudah punya akun? <span class="font-bold text-blue-500 underline">Masuk di sini</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection