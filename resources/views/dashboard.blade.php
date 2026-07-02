@extends('layouts.frontend')

@section('content')
<div class="bg-white dark:bg-slate-950 border-b border-slate-100 dark:border-slate-800 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90 dark:bg-slate-950/90 transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                S
            </div>
            <span class="text-xs font-black text-slate-900 dark:text-slate-100 tracking-tight">
                SkillStore <span class="text-blue-600 dark:text-blue-400 font-medium bg-blue-50 dark:bg-blue-950 px-2 py-0.5 rounded-md ml-1">Workspace</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition flex items-center gap-1">
                🏠 Beranda Utama
            </a>
            <span class="text-slate-300 dark:text-slate-600">|</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center
                    px-4 py-2
                    bg-blue-600 hover:bg-blue-700
                    dark:bg-blue-500 dark:hover:bg-blue-400
                    text-white
                    font-bold text-xs
                    rounded-xl
                    transition">
                    🚪 Keluar Akun
                </button>
            </form>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50 dark:bg-slate-950 min-h-[90vh] transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6 transition-colors">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-xl">
                    👋
                </div>
                <div>
                    <h2 class="text-lg font-black text-slate-900 dark:text-slate-100 tracking-tight">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Hak akses internal sebagai <span class="text-blue-600 dark:text-blue-400 font-bold">{{ ucfirst(auth()->user()->role) }}</span>.
                    </p>
                </div>
            </div>
            
            <div class="flex items-center gap-6 divide-x divide-slate-100 dark:divide-slate-700 bg-slate-50 dark:bg-slate-950 border border-slate-100 dark:border-slate-800 p-3 px-5 rounded-2xl transition-colors duration-300">
                <div>
                    <span class="block text-[9px] font-bold text-slate-400 uppercase">Status Akun</span>
                    <span class="flex items-center gap-1 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full {{ auth()->user()->status === 'active' ? 'bg-emerald-500' : 'bg-amber-400' }}"></span>
                        <span class="text-xs font-black text-slate-700 dark:text-slate-300 uppercase">{{ auth()->user()->status }}</span>
                    </span>
                </div>
                <div class="pl-6">
                    <span class="block text-[9px] font-bold text-slate-400 uppercase">Terdaftar</span>
                    <span class="text-xs font-black text-slate-700 dark:text-slate-300">{{ auth()->user()->created_at->format('M Y') }}</span>
                </div>
            </div>
        </div>

        @if (! auth()->user()->hasCompletedProfile())
            <div class="rounded-3xl
                border border-blue-100 dark:border-blue-900/50
                bg-blue-50/40 dark:bg-blue-950/30
                p-5
                flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4
                transition-colors duration-300">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-xl
                        bg-blue-500/10 dark:bg-blue-500/20
                        text-blue-600 dark:text-blue-400
                        flex items-center justify-center text-sm flex-shrink-0">
                        ⚡
                    </div>
                    <div>
                        <h3 class="text-xs font-black text-blue-900 tracking-tight">Aksi Diperlukan: Profil Belum Lengkap</h3>
                        <p class="mt-0.5 text-xs text-blue-700/80 dark:text-blue-300/80 leading-relaxed">
                            Beberapa fitur publikasi mungkin dibatasi. Selesaikan pengisian data identitas siswa Anda sekarang.
                        </p>
                    </div>
                </div>
                <a href="{{ route('student-profile.edit') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm dark:border-slate-800 shadow-blue-500/10 flex-shrink-0">
                    Lengkapi Profil ↗
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
                        <h3 class="text-xs font-black
                            text-blue-900 dark:text-blue-200
                            tracking-tight">
                            👤 Informasi Data Diri
                        </h3>
                    </div>
                    <div class="p-6 divide-y divide-slate-50 dark:divide-slate-800">
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 first:pt-0">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Lengkap</span>
                            <span class="text-xs font-black text-slate-700 dark:text-slate-300">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nomor Induk Siswa</span>
                            <span class="text-xs font-mono font-bold 
                                text-slate-800 dark:text-slate-200 
                                bg-slate-100 dark:bg-slate-800 
                                px-2 py-0.5 rounded-md transition-colors duration-300">
                                {{ auth()->user()->identity_number }}
                            </span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Surel / Email</span>
                            <span class="text-xs font-bold text-slate-600 dark:text-slate-300">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 last:pb-0">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Verifikasi Keamanan</span>
                            <span class="text-[10px] font-bold dark:text-emerald-300 bg-emerald-50 dark:bg-emerald-900/30 px-2.5 py-0.5 rounded-full">
                                ✓ Terverifikasi Sistem
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-3xl p-5 shadow-sm space-y-4">
                    <h4 class="text-xs font-black text-slate-800 dark:text-slate-200 uppercase pb-3 border-b border-slate-50 dark:border-slate-800">
                        🛠️ Navigasi
                    </h4>
                    
                    <div class="space-y-2">
                        @if (! auth()->user()->hasCompletedProfile())
                            <a href="{{ route('student-profile.edit') }}" 
                               class="flex items-center justify-between p-3 rounded-xl bg-blue-50/50 dark:bg-blue-950/30 border border-blue-100/50 dark:border-blue-900/40 hover:bg-blue-50 dark:hover:bg-blue-900/40 transition group">
                                <span class="text-xs font-bold text-blue-700 dark:text-blue-300">👤 Lengkapi Profil Siswa</span>
                                <span class="text-blue-500 dark:text-blue-300 text-xs transition group-hover:translate-x-0.5">➔</span>
                            </a>
                        @else
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center justify-between
                                p-3
                                rounded-xl
                                bg-white dark:bg-slate-800
                                hover:bg-slate-50 dark:hover:bg-slate-700
                                border border-transparent
                                hover:border-slate-100 dark:hover:border-slate-700
                                transition-colors duration-300
                                group">

                                <span class="text-xs font-bold
                                    text-slate-600 dark:text-slate-100
                                    group-hover:text-slate-900 dark:group-hover:text-white
                                    transition-colors duration-300">
                                    ⚙️ Pengaturan Profil
                                </span>

                                <span class="text-slate-300 dark:text-slate-500
                                    group-hover:text-slate-600 dark:group-hover:text-slate-300
                                    text-xs transition-all duration-300
                                    group-hover:translate-x-0.5">
                                    ➔
                                </span>
                            </a>
                        @endif

                            <a href="{{ route('dashboard.projects.index') }}"
                                class="flex items-center justify-between
                                p-3
                                rounded-xl
                                bg-white dark:bg-slate-800
                                hover:bg-slate-50 dark:hover:bg-slate-700
                                border border-transparent
                                hover:border-slate-100 dark:hover:border-slate-700
                                transition-colors duration-300
                                group">

                                <span class="text-xs font-bold
                                    text-slate-600 dark:text-slate-100
                                    group-hover:text-slate-900 dark:group-hover:text-white
                                    transition-colors duration-300">
                                    📦 Kelola Project Saya
                                </span>

                                <span class="text-slate-300 dark:text-slate-500
                                    group-hover:text-slate-600 dark:group-hover:text-slate-300
                                    text-xs transition-all duration-300
                                    group-hover:translate-x-0.5">
                                    ➔
                                </span>
                            </a>

                        <a href="{{ route('dashboard.projects.create') }}" 
                           class="flex items-center justify-between
                                    p-3
                                    rounded-xl
                                    bg-blue-600
                                    dark:bg-blue-500
                                    text-white
                                    hover:bg-blue-700
                                    dark:hover:bg-blue-400
                                    shadow-sm
                                    shadow-blue-500/10
                                    transition
                                    group
                                    ">
                            <span class="text-xs font-black">⬆️ Upload Project Baru</span>
                            <span class="text-white text-xs transition group-hover:translate-x-0.5">➔</span>
                        </a>
                    </div>
                </div>
                                <div class="bg-slate-900
                                dark:bg-slate-900
                                border border-slate-800
                                rounded-3xl
                                p-5
                                text-white
                                shadow-sm
                                relative
                                overflow-hidden
                                ">
                    <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-white/5 rounded-full blur-xl"></div>
                    <span class="px-2 py-0.5 bg-white/10 dark:bg-white/5 rounded text-[8px] font-bold uppercase tracking-widest text-slate-300">Pedoman Komunitas</span>
                    <h4 class="text-xs font-black tracking-tight mt-2">Jaga Kualitas Source Code</h4>
                    <p class="text-[10px] text-slate-400 dark:text-slate-500 mt-1 leading-relaxed">
                        Pastikan setiap berkas project yang Anda unggah bebas dari virus, *malware*, dan memiliki struktur dokumentasi/bacaan instalasi yang jelas.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection