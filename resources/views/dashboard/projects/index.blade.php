@extends('layouts.frontend')

@section('content')

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

            <div class="flex items-center gap-5 flex-1 justify-end text-xs font-semibold">
                <a href="{{ route('dashboard') }}" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    Dashboard
                </a>
                <span class="text-slate-200 dark:text-slate-800">|</span>
                <a href="{{ url('/') }}" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda Utama
                </a>
            </div>
            
        </div>
    </div>
</nav>

<div class="py-12 bg-slate-50/50 dark:bg-slate-950 min-h-[90vh] transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center text-xl shadow-sm flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-14L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-tight">
                        Manajemen Project Saya
                    </h2>
                    <p class="text-xs font-medium text-slate-400 dark:text-slate-500 mt-0.5">
                        Kelola, publikasikan, atau perbarui semua berkas berkas portofolio pemrograman Anda.
                    </p>
                </div>
            </div>
            <div>
                <a href="{{ route('dashboard.projects.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition-all duration-200 w-full sm:w-auto shadow-sm cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Upload Project Baru
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/60 rounded-xl p-4 shadow-sm flex items-center justify-between transition-all duration-300">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-slate-800 flex items-center justify-center text-blue-600 dark:text-blue-400 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-600 dark:text-slate-400">
                        Total Koleksi: <span class="text-blue-600 dark:text-blue-400 font-bold">{{ $projects->total() }}</span> project aktif terdaftar
                    </p>
                </div>
            </div>
        </div>

        @if ($projects->isEmpty())
            <div class="rounded-2xl border border-dashed border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-16 text-center shadow-sm transition-all duration-300">
                <div class="w-12 h-12 bg-slate-50 dark:bg-slate-800 text-slate-400 dark:text-slate-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5M5 19v-4a2 2 0 00-2-2h3M20 11v6m0 0l-3-3m3 3l3-3" />
                    </svg>
                </div>
                <h3 class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider">
                    Belum Ada Project Terdaftar
                </h3>
                <p class="mt-2 text-xs text-slate-400 dark:text-slate-500 max-w-xs mx-auto leading-relaxed font-medium">
                    Karyamu berhak dilihat dunia! Mulailah mengunggah hasil karya pemrograman terbaikmu sekarang juga.
                </p>
                <div class="mt-5">
                    <a href="{{ route('dashboard.projects.create') }}" 
                       class="inline-flex items-center px-4 py-2.5 bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-slate-700 font-semibold text-xs rounded-xl transition duration-200">
                        Mulai Upload &rarr;
                    </a>
                </div>
            </div>
        @else
            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl shadow-sm overflow-hidden transition-all duration-300">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 bg-slate-50/80 dark:bg-slate-800/60 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800/60">Project</th>
                                <th class="px-6 py-4 bg-slate-50/80 dark:bg-slate-800/60 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800/60">Kategori</th>
                                <th class="px-6 py-4 bg-slate-50/80 dark:bg-slate-800/60 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800/60">Status</th>
                                <th class="px-6 py-4 bg-slate-50/80 dark:bg-slate-800/60 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider border-b border-slate-100 dark:border-slate-800/60">Unduhan</th>
                                <th class="px-6 py-4 bg-slate-50/80 dark:bg-slate-800/60 text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider text-right border-b border-slate-100 dark:border-slate-800/60">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-xs font-medium text-slate-600 dark:text-slate-400">
                            @foreach ($projects as $project)
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/20 transition duration-150">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div class="h-12 w-12 rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800 border border-slate-200/40 dark:border-slate-700/40 shadow-sm flex-shrink-0">
                                                @if($project->thumbnails)
                                                    <img src="{{ asset('storage/' . $project->thumbnails) }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                                                @else
                                                    <div class="h-full w-full flex items-center justify-center text-slate-300 dark:text-slate-600 bg-slate-50 dark:bg-slate-800/50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="font-semibold text-slate-800 dark:text-slate-200 tracking-tight line-clamp-1">{{ $project->title }}</div>
                                                <div class="text-[10px] text-slate-400 dark:text-slate-500 font-medium mt-0.5">Diperbarui {{ $project->updated_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-1 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 rounded-md text-[10px] font-semibold uppercase tracking-wider border border-slate-200/10">
                                            {{ optional($project->category)->category_name ?? 'General' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($project->status === 'Published')
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 font-medium text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Published
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-50 dark:bg-amber-950/40 text-amber-700 dark:text-amber-400 font-medium text-[10px]">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Pending
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-700 dark:text-slate-300">
                                        <span class="text-slate-400 dark:text-slate-500 text-[11px] mr-0.5">📥</span> {{ number_format($project->download_count ?? 0) }} <span class="text-[10px] text-slate-400 dark:text-slate-500 font-normal">unduhan</span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('dashboard.projects.edit', $project) }}"
                                                class="inline-flex items-center justify-center px-3 py-1.5 bg-blue-50 dark:bg-blue-950/40 hover:bg-blue-100 dark:hover:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-semibold text-[11px] rounded-lg transition duration-200">
                                                Edit
                                            </a>

                                            <form action="{{ route('dashboard.projects.destroy', $project) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen project ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center justify-center px-3 py-1.5 bg-rose-50 dark:bg-rose-950/40 hover:bg-rose-100 dark:hover:bg-rose-900/30 text-rose-600 dark:text-rose-400 font-semibold text-[11px] rounded-lg transition duration-200 cursor-pointer">
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
            
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @endif

    </div>
</div>
@endsection