@extends('layouts.frontend')

@section('content')

<!-- NAVBAR DASHBOARD (Sinkron 100% dengan Tinggi h-20 & Gaya Landing Page) -->
<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 transition-all duration-300 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 shadow-sm shadow-blue-500/[0.03] dark:shadow-none">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            
            <div class="flex items-center gap-2 flex-shrink-0">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-bold text-white text-lg shadow-sm shadow-blue-600/10">S</div>
                <span class="text-xl font-bold tracking-tight text-slate-800 dark:text-slate-200 transition-colors duration-300">
                    Skill<span class="text-blue-600">Store</span>
                    <span class="text-blue-600 dark:text-blue-400 font-medium bg-blue-50 dark:bg-blue-950/60 px-2 py-0.5 rounded-md ml-1.5 border border-blue-100/30 dark:border-blue-900/30 text-[10px] uppercase tracking-wider align-middle">Workspace</span>
                </span>
            </div>

            <div class="flex items-center gap-4 flex-1 justify-end">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    Dashboard
                </a>
                
                <span class="text-slate-200 dark:text-slate-800">|</span>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda Utama
                </a>
            </div>
            
        </div>
    </div>
</nav>

<!-- Main Wrapper -->
<div class="py-12 bg-slate-50/50 dark:bg-slate-950 min-h-screen transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Judul -->
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 shadow-sm flex items-center gap-4 transition-all duration-300">
            <div class="w-10 h-10 bg-slate-50 dark:bg-slate-800/60 rounded-xl flex items-center justify-center text-slate-600 dark:text-slate-400 border border-slate-100 dark:border-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-tight">Pengaturan Profil & Keamanan</h2>
                <p class="text-xs text-slate-400 mt-0.5">Kelola data keanggotaan siswa serta perbarui kredensial kata sandi akun Anda.</p>
            </div>
        </div>

        <form action="{{ route('student-profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('patch')

            <!-- KELOMPOK 1: INFORMASI DATA DIRI SISWA -->
            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Informasi Data Diri</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Lengkapi data akademis dan profil utama Anda.</p>
                </div>

                <!-- Bagian Foto Profil Modern -->
                <div class="flex flex-col sm:flex-row items-center gap-5 pb-4 border-b border-slate-50 dark:border-slate-800/40">
                    <div class="relative w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200/60 dark:border-slate-700/60">
                        <img src="{{ isset($user->studentProfile) && $user->studentProfile->photo ? asset('storage/'.$user->studentProfile->photo) : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80' }}" class="w-full h-full object-cover" alt="Foto Profil">
                    </div>
                    <div class="space-y-1.5 text-center sm:text-left">
                        <label for="photo" class="block text-xs font-semibold text-slate-700 dark:text-slate-300">Foto Profil</label>
                        <input type="file" id="photo" name="photo" class="block w-full text-xs text-slate-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-600 dark:file:bg-blue-950/40 dark:file:text-blue-400 hover:file:bg-blue-100 transition">
                        <p class="text-[10px] text-slate-400">Rekomendasi rasio 1:1, Maksimal 2MB.</p>
                    </div>
                </div>

                <!-- Input Grid Data Diri -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">NIS</label>
                        <input type="text" name="nis" value="{{ auth()->user()->identity_number }}"value="{{ old('nis', $user->nis) }}" class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Kelas</label>
                        <input type="text" name="class" value="{{ old('class', $user->studentProfile->class ?? '') }}" 
                            placeholder="Contoh: XII RPL 2" required 
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('class') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('class') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Jurusan</label>
                        <input type="text" name="major" value="{{ old('major', $user->studentProfile->major ?? '') }}" 
                            placeholder="Contoh: Rekayasa Perangkat Lunak   " required 
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('class') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('major') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Nomor Telepon</label>
                        <input type="tel" name="phone" value="{{ old('phone', $user->studentProfile->phone ?? '') }}" 
                            placeholder="Contoh: 0812-3456-7890" required 
                            pattern="[0-9\-+ ]*"
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('phone') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('phone') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" 
                            value="{{ old('tanggal_lahir', isset($user->studentProfile->birth_date) ? \Carbon\Carbon::parse($user->studentProfile->birth_date)->format('Y-m-d') : '') }}" 
                            class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>

                    <div class="sm:col-span-2 space-y-1.5">
        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Alamat Rumah</label>
        <textarea name="address" rows="3" placeholder="Contoh: Jl. Merdeka No. 12, RT 03/RW 05..." required 
                class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('address') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50 resize-none">{{ old('address', $user->studentProfile->address ?? '') }}</textarea>
        @error('address') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
    </div>
                </div>
            </div>

            <!-- KELOMPOK 2: AKUN & SISTEM (Email, Role, Status - Read Only / Disabled) -->
            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Sistem & Kredensial</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Informasi inti akun Anda yang dikunci oleh sistem.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-400 dark:text-slate-500">Alamat Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full text-xs font-medium bg-slate-100/60 dark:bg-slate-950/40 text-slate-400 dark:text-slate-500 rounded-xl border border-slate-200/60 dark:border-slate-800/80 p-3 cursor-not-allowed" readonly>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-400 dark:text-slate-500">Role Hak Akses</label>
                        <input type="text" value="{{ ($user->role ?? 'Siswa') }}" class="w-full text-xs font-semibold bg-slate-100/60 dark:bg-slate-950/40 text-slate-400 dark:text-slate-500 rounded-xl border border-slate-200/60 dark:border-slate-800/80 p-3 cursor-not-allowed uppercase" readonly>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-400 dark:text-slate-500">Status Keanggotaan</label>
                        <input type="text" value="{{ $user->status ? 'Aktif' : 'Non-Aktif' }}" class="w-full text-xs font-semibold bg-slate-100/60 dark:bg-slate-950/40 text-slate-400 dark:text-slate-500 rounded-xl border border-slate-200/60 dark:border-slate-800/80 p-3 cursor-not-allowed" readonly>
                    </div>
                </div>
            </div>

            <!-- KELOMPOK 3: KEAMANAN (Perbarui Kata Sandi) -->
            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Perbarui Kata Sandi</h3>
                    <p class="text-[11px] text-slate-400 mt-0.5">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk menjaga keamanan.</p>
                </div>

                <div class="space-y-5 max-w-xl">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Kata Sandi Saat Ini <span class="text-rose-500">*</span></label>
                        <input type="password" name="current_password" autocomplete="current-password" class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Kata Sandi Baru <span class="text-rose-500">*</span></label>
                        <input type="password" name="password" autocomplete="new-password" class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-medium text-slate-600 dark:text-slate-400">Konfirmasi Kata Sandi Baru <span class="text-rose-500">*</span></label>
                        <input type="password" name="password_confirmation" autocomplete="new-password" class="w-full text-xs font-medium bg-slate-50/50 dark:bg-slate-950/50 text-slate-800 dark:text-slate-200 rounded-xl border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 p-3 transition duration-150">
                    </div>
                </div>
            </div>

            <!-- Tombol Simpan Perubahan Utama -->
            <div class="flex items-center justify-end gap-4">
                <button type="submit" class="px-5 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition duration-150 transform active:scale-95 shadow-sm shadow-blue-600/10 cursor-pointer">
                    Simpan Seluruh Perubahan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection