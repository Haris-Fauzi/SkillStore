@extends('layouts.frontend')

@section('content')

    <nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 transition-all duration-300 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 shadow-sm shadow-blue-500/[0.2] dark:shadow-none">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between gap-4">
                
                <div class="flex items-center gap-2 text-sm font-bold text-slate-800 dark:text-slate-200">
                    <a href="{{ route('home') }}" class="text-slate-600 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-150">Beranda</a>
                    <span class="text-slate-300 dark:text-slate-700">/</span>
                    <span class="text-slate-900 dark:text-slate-100 truncate font-black">{{ $project->title }}</span>
                </div>

                <div class="flex items-center gap-4 flex-1 justify-end">
                    <a href="{{ route('home') }}" class="text-sm font-bold text-slate-800 dark:text-slate-200 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1">
                        🏠 Kembali ke Galeri
                    </a>
                </div>
                
            </div>
        </div>
    </nav>

    <div class="py-12 bg-slate-50/50 dark:bg-slate-950 min-h-screen transition-colors duration-300">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
                        @if($project->thumbnails)
                            <div class="relative aspect-[16/9] w-full bg-slate-100 dark:bg-slate-800 border-b border-slate-100 dark:border-slate-800/60 group overflow-hidden">
                                <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $project->title }}">
                                <span class="absolute top-4 left-4 px-3 py-1 text-[12px] font-black text-blue-600 dark:text-blue-400 bg-white/95 dark:bg-slate-900/95 backdrop-blur-sm rounded-lg shadow-sm border border-slate-100/50 dark:border-slate-800 uppercase tracking-wider">
                                    {{ optional($project->category)->category_name ?? 'General' }}
                                </span>
                            </div>
                        @else
                            <div class="w-full aspect-[16/9] bg-slate-100 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800/60 flex flex-col items-center justify-center text-slate-400 dark:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 stroke-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-6 sm:p-8">
                            <div class="space-y-2">
                                <h1 class="text-lg sm:text-2xl font-black text-slate-900 dark:text-slate-50 tracking-tighter leading-tight transition-colors duration-300">
                                    {{ $project->title }}
                                </h1>
                                <div class="h-1 w-16 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 shadow-sm shadow-blue-500/20"></div>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800/60">
                                <h3 class="text-base font-black text-slate-900 dark:text-slate-100 uppercase tracking-wider">Deskripsi Project</h3>
                                <p class="text-sm text-slate-800 dark:text-slate-200 leading-relaxed whitespace-pre-line font-bold antialiased">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl p-6 sm:p-8 shadow-sm transition-all duration-300 hover:shadow-md">
                        <h3 class="text-base font-black text-slate-900 dark:text-slate-100 uppercase tracking-wider mb-4 flex items-center gap-2">
                            Screenshot Project 
                            <span class="px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-slate-100 rounded-full text-[12px] font-black border border-slate-200/50">{{ $project->screenshots->count() }}</span>
                        </h3>

                        @if($project->screenshots->count())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($project->screenshots as $shot)
                                    <a href="{{ asset('storage/'.$shot->image) }}" target="_blank" class="group relative aspect-video rounded-2xl overflow-hidden border border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-800 shadow-sm block">
                                        <img src="{{ asset('storage/'.$shot->image) }}" alt="Screenshot {{ $loop->iteration }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                        <div class="absolute inset-0 bg-slate-900/30 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center backdrop-blur-[1px]">
                                            <span class="bg-white dark:bg-slate-900 shadow-md text-[10px] font-bold text-slate-900 dark:text-slate-100 p-2 px-3 rounded-xl border border-slate-200/50 transform scale-95 group-hover:scale-100 transition duration-300">Buka ↗</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 p-8 text-center text-xs font-bold text-slate-600 dark:text-slate-400 transition-colors duration-300">
                                Belum ada screenshot tambahan untuk project ini.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:sticky lg:top-6 space-y-6">
                    
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-3xl p-6 shadow-md hover:shadow-lg space-y-5 transition-all duration-300">
                        <h3 class="text-s font-black text-slate-900 dark:text-slate-100 uppercase tracking-wider pb-3 border-b border-slate-100 dark:border-slate-800/60">Informasi Portofolio</h3>
                        
                        <div class="space-y-4 text-[13px] font-bold">
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-800 dark:text-slate-300">👤 Pembuat</span>
                                <span class="font-black text-slate-900 dark:text-slate-100">{{ optional($project->user)->name ?? 'Anonim' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-800 dark:text-slate-300">📦 Versi</span>
                                <span class="font-black text-slate-900 dark:text-slate-100 bg-slate-100 dark:bg-slate-800 px-2 py-0.5 rounded-md text-[10px] border border-slate-300 dark:border-slate-700">{{ $project->version ?? 'v1.0.0' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-800 dark:text-slate-300">📅 Tahun Rilis</span>
                                <span class="font-black text-slate-900 dark:text-slate-100">{{ $project->year ?? '2026' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-800 dark:text-slate-300">📥 Total Unduh</span>
                                <span class="font-bold text-slate-900 dark:text-slate-100 flex items-center gap-1">
                                    <span class="font-black text-blue-600 dark:text-blue-400">{{ number_format($project->download_count ?? 0) }}</span> kali
                                </span>
                            </div>
                        </div>

                        <div class="pt-2 space-y-2.5">
                            <a href="{{ route('projects.download', $project->slug) }}" class="flex items-center justify-center w-full py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-[13px] shadow-md shadow-blue-500/10 hover:shadow-blue-500/20 transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                                📥 Download Source Code
                            </a>
                            
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="flex items-center justify-center w-full py-3 rounded-2xl bg-emerald-50 dark:bg-emerald-950/40 hover:bg-emerald-600 hover:text-white dark:hover:bg-emerald-800 text-emerald-800 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800/60 font-bold text-[13px] transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                                    🌐 Lihat Demo Aplikasi
                                </a>
                            @endif

                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="flex items-center justify-center w-full py-3 rounded-2xl bg-slate-900 dark:bg-slate-800 hover:bg-slate-800 dark:hover:bg-slate-700 text-white font-bold text-[13px] border border-transparent dark:border-slate-700/60 transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 shadow-sm">
                                    🐙 Buka Repositori GitHub
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-6 text-white shadow-lg shadow-blue-500/10 hover:shadow-blue-500/30 relative overflow-hidden group">
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-xl group-hover:scale-125 transition duration-500"></div>
                        <h4 class="text-[13px] font-black uppercase tracking-wider mb-2">Butuh Bantuan?</h4>
                        <p class="text-[11px] text-blue-100 leading-relaxed mb-4 font-bold">Jika Anda mengalami kendala saat memasang atau menjalankan source code project ini, silakan hubungi pengembang.</p>
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 bg-white dark:bg-slate-900 text-blue-600 dark:text-blue-400 font-bold text-[11px] rounded-xl shadow hover:bg-blue-50 dark:hover:bg-slate-800 hover:scale-[1.03] active:scale-100 transition-all duration-200">
                            Hubungi Pembuat
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection