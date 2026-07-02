@extends('layouts.frontend')

@section('content')
<!-- 1. TOP BAR INTERNAL MINIMALIS (SINKRON DENGAN DASHBOARD UTAMA) -->
<div class="bg-white dark:bg-slate-950 transition-colors duration-300 border-b border-slate-100 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                S
            </div>
            <span class="text-xs font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight">
                SkillStore <span class="text-blue-600 font-medium bg-blue-50 px-2 py-0.5 rounded-md ml-1">Workspace</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                📊 Dashboard Utama
            </a>
            <span class="text-slate-200">|</span>
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                🏠 Beranda Utama
            </a>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50 dark:bg-slate-800/50 min-h-[90vh]">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- 2. HEADER MANAJEMEN PROJECT -->
        <div class="bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 rounded-3xl p-6 shadow-sm dark:border-slate-800 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-xl shadow-sm dark:border-slate-800 shadow-blue-500/5">
                    📦
                </div>
                <div>
                    <h2 class="text-lg font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight">
                        Manajemen Project Saya
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        Kelola, publikasikan, atau perbarui semua berkas source code yang telah kamu bagikan.
                    </p>
                </div>
            </div>
            <div>
                <a href="{{ route('dashboard.projects.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-md shadow-blue-500/10 w-full sm:w-auto">
                    ✨ Upload Project Baru
                </a>
            </div>
        </div>

        <!-- RINGKASAN RINGKAS JUMLAH DATA -->
        <div class="bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 rounded-2xl p-4 shadow-sm dark:border-slate-800 shadow-slate-100/30 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-sm">
                    📊
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-700">
                        Total Koleksi: <span class="text-blue-600 font-black">{{ $projects->total() }}</span> project aktif terdaftar
                    </p>
                </div>
            </div>
        </div>

        <!-- KONDISI JIKA DATA PROYEK MASIH KOSONG -->
        @if ($projects->isEmpty())
            <div class="rounded-3xl border border-dashed border-slate-200 dark:border-slate-700 transition-colors duration-300 bg-white dark:bg-slate-950 transition-colors duration-300 p-12 text-center shadow-sm dark:border-slate-800">
                <div class="w-14 h-14 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto text-xl mb-4">
                    📁
                </div>
                <h3 class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider">
                    Belum Ada Project Terdaftar
                </h3>
                <p class="mt-2 text-xs text-slate-400 max-w-xs mx-auto leading-relaxed">
                    Karyamu berhak dilihat dunia! Mulailah mengunggah hasil karya pemrograman terbaikmu sekarang juga.
                </p>
                <div class="mt-5">
                    <a href="{{ route('dashboard.projects.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 font-bold text-xs rounded-xl transition">
                        Mulai Upload ↗
                    </a>
                </div>
            </div>
        @else
            <!-- TABEL DATA PREMIUM (SLATE THEME) -->
            <div class="bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 rounded-3xl shadow-sm dark:border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 bg-slate-50 dark:bg-slate-800/80 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Project</th>
                                <th class="px-6 py-4 bg-slate-50 dark:bg-slate-800/80 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 bg-slate-50 dark:bg-slate-800/80 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 bg-slate-50 dark:bg-slate-800/80 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Unduhan</th>
                                <th class="px-6 py-4 bg-slate-50 dark:bg-slate-800/80 text-[10px] font-bold text-slate-400 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-xs">
                            @foreach ($projects as $project)
                                <tr class="hover:bg-slate-50 dark:bg-slate-800/40 transition">
                                    <!-- Kolom Judul & Gambar Cover -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="h-12 w-12 rounded-xl overflow-hidden bg-slate-100 border border-slate-100 flex-shrink-0">
                                                @if($project->thumbnails)
                                                    <img src="{{ asset('storage/' . $project->thumbnails) }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                                                @else
                                                    <div class="h-full w-full flex items-center justify-center text-slate-300 bg-slate-50 dark:bg-slate-800">🖼️</div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-black text-slate-800 dark:text-slate-200 tracking-tight line-clamp-1">{{ $project->title }}</div>
                                                <div class="text-[10px] text-slate-400 font-medium mt-0.5">Diperbarui {{ $project->updated_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Kolom Badge Kategori -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                            {{ optional($project->category)->category_name ?? 'General' }}
                                        </span>
                                    </td>

                                    <!-- Kolom Status Penerbitan -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($project->status === 'Published')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 font-bold text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 text-amber-700 font-bold text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Pending
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Kolom Kaunter Download -->
                                    <td class="px-6 py-4 whitespace-nowrap font-bold text-slate-700">
                                        📥 {{ number_format($project->download_count ?? 0) }} <span class="text-[10px] text-slate-400 font-normal">kali</span>
                                    </td>

                                    <!-- Kolom Tombol Mutasi Konten -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('dashboard.projects.edit', $project) }}"
                                                class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold text-[11px] rounded-lg transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('dashboard.projects.destroy', $project) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen project ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-[11px] rounded-lg transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Paginasi Laravel Custom (Jika ada) -->
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @endif

    </div>
</div>
@endsection