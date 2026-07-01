@extends('layouts.frontend')

@section('content')
<div class="bg-white border-b border-slate-100 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                S
            </div>
            <span class="text-xs font-black text-slate-900 tracking-tight">
                SkillStore <span class="text-blue-600 font-medium bg-blue-50 px-2 py-0.5 rounded-md ml-1">Workspace</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition flex items-center gap-1">
                🏠 Beranda Utama
            </a>
            <span class="text-slate-200">|</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-xs font-bold text-rose-500 hover:text-rose-600 transition flex items-center gap-1">
                    🚪 Keluar Akun
                </button>
            </form>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50/50 min-h-[90vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-xl shadow-sm shadow-blue-500/5">
                    👋
                </div>
                <div>
                    <h2 class="text-lg font-black text-slate-900 tracking-tight">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Hak akses internal sebagai <span class="text-blue-600 font-bold">{{ ucfirst(auth()->user()->role) }}</span>. Pantau kontribusimu hari ini.
                    </p>
                </div>
            </div>
            
            <div class="flex items-center gap-6 divide-x divide-slate-100 bg-slate-50 border border-slate-100/80 p-3 px-5 rounded-2xl w-full md:w-auto justify-between md:justify-start">
                <div>
                    <span class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider">Status Akun</span>
                    <span class="inline-flex items-center gap-1 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full {{ auth()->user()->status === 'active' ? 'bg-emerald-500 animate-pulse' : 'bg-amber-400' }}"></span>
                        <span class="text-xs font-black text-slate-700 uppercase tracking-tight">{{ auth()->user()->status }}</span>
                    </span>
                </div>
                <div class="pl-6">
                    <span class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider">Terdaftar Sejak</span>
                    <span class="text-xs font-black text-slate-700 block mt-0.5">{{ auth()->user()->created_at->format('M Y') }}</span>
                </div>
            </div>
        </div>

        @if (! auth()->user()->hasCompletedProfile())
            <div class="rounded-3xl border border-blue-100 bg-blue-50/40 p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-sm flex-shrink-0">
                        ⚡
                    </div>
                    <div>
                        <h3 class="text-xs font-black text-blue-900 tracking-tight">Aksi Diperlukan: Profil Belum Lengkap</h3>
                        <p class="mt-0.5 text-xs text-blue-700/80 leading-relaxed">
                            Beberapa fitur publikasi mungkin dibatasi. Selesaikan pengisian data identitas siswa Anda sekarang.
                        </p>
                    </div>
                </div>
                <a href="{{ route('student-profile.edit') }}"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm shadow-blue-500/10 flex-shrink-0">
                    Lengkapi Profil ↗
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-slate-100 rounded-3xl shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-slate-50/50 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider flex items-center gap-2">
                            👤 Informasi Data Diri
                        </h3>
                    </div>
                    <div class="p-6 divide-y divide-slate-50">
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 first:pt-0">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama Lengkap</span>
                            <span class="text-xs font-black text-slate-700">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nomor Induk Siswa</span>
                            <span class="text-xs font-mono font-bold text-slate-800 bg-slate-100 px-2 py-0.5 rounded-md">{{ auth()->user()->identity_number }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Surel / Email</span>
                            <span class="text-xs font-bold text-slate-600">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="py-3.5 flex flex-col sm:flex-row sm:items-center justify-between gap-1 last:pb-0">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Verifikasi Keamanan</span>
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-full">
                                ✓ Terverifikasi Sistem
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white border border-slate-100 rounded-3xl p-5 shadow-sm space-y-4">
                    <h4 class="text-xs font-black text-slate-800 uppercase tracking-wider pb-3 border-b border-slate-50 flex items-center gap-2">
                        🛠️ Navigasi Kerja
                    </h4>
                    
                    <div class="space-y-2">
                        @if (! auth()->user()->hasCompletedProfile())
                            <a href="{{ route('student-profile.edit') }}" 
                               class="flex items-center justify-between p-3 rounded-xl bg-blue-50/50 border border-blue-100/50 hover:bg-blue-50 transition group">
                                <span class="text-xs font-bold text-blue-700">👤 Lengkapi Profil Siswa</span>
                                <span class="text-blue-500 text-xs transition group-hover:translate-x-0.5">➔</span>
                            </a>
                        @else
                            <a href="{{ route('profile.edit') }}" 
                               class="flex items-center justify-between p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition group">
                                <span class="text-xs font-bold text-slate-600 group-hover:text-slate-900">⚙️ Pengaturan Profil</span>
                                <span class="text-slate-300 group-hover:text-slate-600 text-xs transition group-hover:translate-x-0.5">➔</span>
                            </a>
                        @endif

                        <a href="{{ route('dashboard.projects.index') }}" 
                           class="flex items-center justify-between p-3 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition group">
                            <span class="text-xs font-bold text-slate-600 group-hover:text-slate-900">📦 Kelola Project Saya</span>
                            <span class="text-slate-300 group-hover:text-slate-600 text-xs transition group-hover:translate-x-0.5">➔</span>
                        </a>

                        <a href="{{ route('dashboard.projects.create') }}" 
                           class="flex items-center justify-between p-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700 shadow-sm shadow-blue-500/10 transition group">
                            <span class="text-xs font-black">⬆️ Upload Project Baru</span>
                            <span class="text-white text-xs transition group-hover:translate-x-0.5">➔</span>
                        </a>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-3xl p-5 text-white shadow-sm relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-white/5 rounded-full blur-xl"></div>
                    <span class="px-2 py-0.5 bg-white/10 rounded text-[8px] font-bold uppercase tracking-widest text-slate-300">Pedoman Komunitas</span>
                    <h4 class="text-xs font-black tracking-tight mt-2">Jaga Kualitas Source Code</h4>
                    <p class="text-[10px] text-slate-400 mt-1 leading-relaxed">
                        Pastikan setiap berkas project yang Anda unggah bebas dari virus, *malware*, dan memiliki struktur dokumentasi/bacaan instalasi yang jelas.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection