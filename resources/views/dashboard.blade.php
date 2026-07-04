@extends('layouts.frontend')

@section('content')
{{-- 1. NAVBAR DASHBOARD (Sinkron 100% dengan Tinggi h-20 & Gaya Landing Page) --}}
<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 transition-all duration-300 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 shadow-md shadow-blue-500/[0.1] dark:shadow-none">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            
            <div class="flex items-center gap-2 flex-shrink-0">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-black text-white text-lg shadow-md shadow-blue-600/20">S</div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 transition-colors duration-300">
                    Skill<span class="text-blue-600">Store</span>
                    <span class="text-blue-600 dark:text-blue-400 font-semibold bg-blue-50 dark:bg-blue-950/60 px-2 py-0.5 rounded-md ml-1.5 border border-blue-100/30 dark:border-blue-900/30 text-[10px] uppercase tracking-wider align-middle">Workspace</span>
                </span>
            </div>

            <div class="flex items-center gap-4 flex-1 justify-end">
                <a href="{{ url('/') }}" class="text-[13px] font-bold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda Utama
                </a>
                
                <span class="text-slate-200 dark:text-slate-800">|</span>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-rose-600 dark:text-rose-400 bg-rose-50/50 dark:bg-rose-950/20 border border-rose-200/60 dark:border-rose-900/30 rounded-xl hover:bg-rose-100 hover:text-rose-700 dark:hover:bg-rose-950/50 dark:hover:text-rose-300 transition duration-200 focus:outline-none focus:ring-4 focus:ring-rose-500/10">
                        <svg xmlns="http://www.w3.org" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Keluar Aplikasi</span>
                    </button>
                </form>
            </div>

            <!-- Dark Mode Switcher -->
            <button 
                x-data="{ darkMode: document.documentElement.classList.contains('dark') }"
                x-on:click="
                    darkMode = !darkMode;
                    if (darkMode) {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                "
                class="p-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700 text-xs shadow-sm hover:bg-slate-100 dark:hover:bg-slate-700 transition cursor-pointer"
            >
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode">☀️</span>
            </button>
            
        </div>
    </div>
</nav>

{{-- 2. KONTEN UTAMA DASHBOARD --}}
<div class="py-8 bg-slate-50/50 dark:bg-slate-950 min-h-[90vh] transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        {{-- Banner Selamat Datang & Status Akun --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl p-6 shadow-sm hover:shadow-md flex flex-col md:flex-row md:items-center justify-between gap-6 transition-colors duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-slate-800/60 border border-blue-100/20 dark:border-slate-700/50 rounded-2xl flex items-center justify-center text-xl flex-shrink-0">
                    👋
                </div>
                <div>
                    <h2 class="text-lg font-black text-slate-900 dark:text-slate-100 tracking-tight transition-colors duration-300">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-medium">
                        Hak akses internal sebagai <span class="text-blue-600 dark:text-blue-400 font-bold">{{ ucfirst(auth()->user()->role) }}</span>.
                    </p>
                </div>
            </div>
            
            <div class="flex items-center gap-6 divide-x divide-slate-100 dark:divide-slate-800 bg-slate-50 dark:bg-slate-950/40 border border-slate-100 dark:border-slate-800 px-5 py-3 rounded-2xl transition-colors duration-300">
                <div>
                    <span class="block text-[9px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Status Akun</span>
                    <span class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-2 h-2 rounded-full {{ auth()->user()->status === 'active' ? 'bg-emerald-500 animate-pulse' : 'bg-amber-400' }}"></span>
                        <span class="text-xs font-black text-slate-700 dark:text-slate-300 uppercase tracking-tight">{{ auth()->user()->status }}</span>
                    </span>
                </div>
                <div class="pl-6">
                    <span class="block text-[9px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Terdaftar</span>
                    <span class="text-xs font-black text-slate-700 dark:text-slate-300 mt-0.5 block tracking-tight">{{ auth()->user()->created_at->format('M Y') }}</span>
                </div>
            </div>
        </div>

        {{-- Alert Jika Profil Belum Lengkap --}}
        @if (! auth()->user()->hasCompletedProfile())
            <div class="rounded-3xl border border-amber-100 dark:border-amber-950/60 bg-amber-50/50 dark:bg-amber-950/20 p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 transition-colors duration-300">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-xl bg-amber-500/10 dark:bg-amber-500/20 text-amber-600 dark:text-amber-400 flex items-center justify-center text-sm flex-shrink-0">
                        ⚠️
                    </div>
                    <div>
                        <h3 class="text-xs font-black text-amber-900 dark:text-amber-200 tracking-tight">Aksi Diperlukan: Selesaikan Pengisian Profil</h3>
                        <p class="mt-0.5 text-xs text-amber-700 dark:text-amber-400/80 leading-relaxed font-medium">
                            Beberapa fitur publikasi repositori mungkin dibatasi sebelum divalidasi. Selesaikan pengisian data identitas siswa Anda sekarang.
                        </p>
                    </div>
                </div>
                <a href="{{ route('student-profile.edit') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs rounded-xl transition shadow-sm shadow-amber-500/10 flex-shrink-0">
                    Lengkapi Profil ➔
                </a>
            </div>
        @endif

        {{-- Grid Informasi & Menu Utama --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            {{-- Sisi Kiri: Informasi Identitas Akun & Kontainer Baru Biodata --}}
            <div class="lg:col-span-2 space-y-6">
                
                {{-- 1. Kontainer Informasi Akun --}}
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl shadow-sm hover:shadow-md overflow-hidden transition-colors duration-300">
                    <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/40 border-b border-slate-100 dark:border-slate-800/60">
                        <h3 class="text-xs font-black text-slate-800 dark:text-slate-200 tracking-tight uppercase tracking-wider">
                            👤 Informasi Identitas Akun
                        </h3>
                    </div>
                    <div class="p-6 divide-y divide-slate-50 dark:divide-slate-800/60">
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 first:pt-0">
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Nama Lengkap</span>
                            <span class="text-xs font-black text-slate-700 dark:text-slate-200">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Nomor Registrasi / NIS</span>
                            <span class="text-xs font-mono font-bold text-slate-800 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded-md transition-colors duration-300 border dark:border-slate-700">
                                {{ auth()->user()->identity_number }}
                            </span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Alamat Surel / Email</span>
                            <span class="text-xs font-semibold text-slate-600 dark:text-slate-300">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 last:pb-0">
                            <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Verifikasi Keamanan</span>
                            <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-100/30 dark:border-emerald-900/30 px-2.5 py-0.5 rounded-full">
                                ✓ Terverifikasi Sistem
                            </span>
                        </div>
                    </div>
                </div>

                {{-- 2. KONTANIER BARU: Biodata Pengguna (Mengambil dari tabel students_profil) --}}
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl shadow-sm hover:shadow-md overflow-hidden transition-all duration-300">
                    <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/40 border-b border-slate-100 dark:border-slate-800/60 flex items-center justify-between">
                        <h3 class="text-xs font-black text-slate-800 dark:text-slate-200 tracking-tight uppercase tracking-wider">
                            📝 Biodata Lengkap Pengguna
                        </h3>
                        <a href="{{ route('student-profile.edit') }}" class="text-[10px] font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950/50 px-2.5 py-1 rounded-lg border border-blue-100/30 dark:border-blue-900/30 hover:bg-blue-100 dark:hover:bg-blue-950 transition duration-150">
                            Perbarui Data
                        </a>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        {{-- Struktur Foto Profil & Kelas Singkat --}}
                        <div class="flex flex-col sm:flex-row items-center gap-5 pb-5 border-b border-slate-100 dark:border-slate-800/60">
                            <div class="relative w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden border border-slate-200/60 dark:border-slate-700/60 flex-shrink-0 shadow-inner">
                                @if(auth()->user()->studentProfile && auth()->user()->studentProfile->photo)
                                    <img src="{{ asset('storage/' . auth()->user()->studentProfile->photo) }}" class="w-full h-full object-cover" alt="Foto Profil">
                                @else
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" class="w-full h-full object-cover opacity-80" alt="Foto Default">
                                @endif
                            </div>
                            <div class="text-center sm:text-left space-y-1">
                                <h4 class="text-sm font-black text-slate-800 dark:text-slate-100">{{ auth()->user()->name }}</h4>
                                <p class="text-xs font-medium text-slate-400 dark:text-slate-500">
                                    Siswa Terdaftar pada Portal <span class="text-blue-600 font-bold">SkillStore</span>
                                </p>
                            </div>
                        </div>

                        {{-- Detail List Biodata --}}
                        <div class="divide-y divide-slate-50 dark:divide-slate-800/60">
                            <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 first:pt-0">
                                <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Kelas</span>
                                <span class="text-xs font-black text-slate-700 dark:text-slate-200">
                                    {{ auth()->user()->studentProfile->class ?? 'Belum Diisi' }}
                                </span>
                            </div>
                            <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Jurusan</span>
                                <span class="text-xs font-black text-slate-700 dark:text-slate-200">
                                    {{ auth()->user()->studentProfile->major ?? 'Belum Diisi' }}
                                </span>
                            </div>
                            <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Tanggal Lahir</span>
                                <span class="text-xs font-bold text-slate-700 dark:text-slate-200">
                                    @if(auth()->user()->studentProfile && auth()->user()->studentProfile->birth_date)
                                        {{ \Carbon\Carbon::parse(auth()->user()->studentProfile->birth_date)->translatedFormat('d F Y') }}
                                    @else
                                        Belum Diisi
                                    @endif
                                </span>
                            </div>
                            <div class="py-3.5 flex flex-col sm:flex-row sm:items-start justify-between gap-1 last:pb-0">
                                <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider sm:pt-0.5">Alamat Lengkap</span>
                                <p class="text-xs font-medium text-slate-600 dark:text-slate-300 text-left sm:text-right max-w-md leading-relaxed">
                                    {{ auth()->user()->studentProfile->address ?? 'Belum Diisi alamat domisili' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Sisi Kanan: Kontrol Utama / Navigasi Fitur --}}
            <div class="space-y-6">
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl p-5 shadow-sm hover:shadow-md space-y-4 transition-colors duration-300">
                    <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase tracking-wider pb-3 border-b border-slate-50 dark:border-slate-800/60">
                        🛠️ Kontrol Workspace
                    </h4>
                    
                    <div class="space-y-2">
                        @if (! auth()->user()->hasCompletedProfile())
                            <a href="{{ route('student-profile.edit') }}" 
                               class="flex items-center justify-between p-3 rounded-xl bg-blue-50/60 dark:bg-blue-950/40 border border-blue-100/50 dark:border-blue-900/40 hover:bg-blue-100/50 dark:hover:bg-blue-900/40 transition group duration-200">
                                <span class="text-xs font-bold text-blue-700 dark:text-blue-300">👤 Lengkapi Profil Siswa</span>
                                <span class="text-blue-500 dark:text-blue-400 text-xs transition group-hover:translate-x-0.5">➔</span>
                            </a>
                        @else
                            <a href="{{ route('student-profile.edit') }}"
                               class="flex items-center justify-between p-3 rounded-xl bg-white dark:bg-slate-800/50 hover:bg-slate-50 dark:hover:bg-slate-800 border border-transparent hover:border-slate-100 dark:hover:border-slate-700/80 transition duration-150 group">
                                <span class="text-xs font-bold text-slate-600 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white transition-colors duration-150">
                                    ⚙️ Pengaturan Profil
                                </span>
                                <span class="text-slate-300 dark:text-slate-500 group-hover:text-slate-600 dark:group-hover:text-slate-300 text-xs transition group-hover:translate-x-0.5">
                                    ➔
                                </span>
                            </a>
                        @endif

                        <a href="{{ route('dashboard.projects.index') }}"
                           class="flex items-center justify-between p-3 rounded-xl bg-white dark:bg-slate-800/50 hover:bg-slate-50 dark:hover:bg-slate-800 border border-transparent hover:border-slate-100 dark:hover:border-slate-700/80 transition duration-150 group">
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-300 group-hover:text-slate-900 dark:group-hover:text-white transition-colors duration-150">
                                📦 Kelola Project Saya
                            </span>
                            <span class="text-slate-300 dark:text-slate-500 group-hover:text-slate-600 dark:group-hover:text-slate-300 text-xs transition group-hover:translate-x-0.5">
                                ➔
                            </span>
                        </a>

                        <a href="{{ route('dashboard.projects.create') }}" 
                           class="flex items-center justify-between p-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white shadow-sm shadow-blue-500/10 hover:shadow-blue-500/20 transition duration-200 group">
                            <span class="text-xs font-black">⬆️ Upload Project Baru</span>
                            <span class="text-white text-xs transition group-hover:translate-x-0.5">➔</span>
                        </a>
                    </div>
                </div>

                {{-- Informasi Aturan --}}
                <div class="bg-slate-900 dark:bg-slate-900 border border-slate-800 rounded-3xl p-5 text-white shadow-sm hover:shadow-md relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-white/5 rounded-full blur-xl"></div>
                    <span class="px-2 py-0.5 bg-white/10 rounded text-[8px] font-bold uppercase tracking-widest text-slate-300">Pedoman Komunitas</span>
                    <h4 class="text-xs font-black tracking-tight mt-2">Jaga Kualitas Source Code</h4>
                    <p class="text-[10px] text-slate-400 dark:text-slate-400 mt-1 leading-relaxed font-medium">
                        Pastikan setiap berkas project yang Anda unggah bebas dari berkas sampah (*junk file*), bebas malware, dan memiliki berkas panduan `README.md` instalasi yang jelas.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection