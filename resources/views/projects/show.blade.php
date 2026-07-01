@extends('layouts.frontend')

@section('content')

    <div class="bg-white border-b border-slate-100 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2 text-xs font-semibold text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
            <span>/</span>
            <span class="text-slate-800 truncate">{{ $project->title }}</span>
        </div>
    </div>

    <div class="py-12 bg-slate-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm">
                        @if($project->thumbnails)
                            <div class="relative aspect-[16/9] w-full bg-slate-100">
                                <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                                <span class="absolute top-4 left-4 px-3 py-1 text-[10px] font-bold text-blue-600 bg-white/95 backdrop-blur-sm rounded-lg shadow-sm uppercase tracking-wider">
                                    {{ optional($project->category)->category_name ?? 'General' }}
                                </span>
                            </div>
                        @else
                            <div class="w-full aspect-[16/9] bg-slate-100 flex flex-col items-center justify-center text-slate-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 stroke-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        @endif

                        <div class="p-6 sm:p-8">
                            <h1 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight leading-tight">
                                {{ $project->title }}
                            </h1>
                            
                            <div class="mt-6 pt-6 border-t border-slate-100">
                                <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-3">Deskripsi Project</h3>
                                <p class="text-xs text-slate-600 leading-relaxed whitespace-pre-line">
                                    {{ $project->description }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm">
                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                            Screenshot Project 
                            <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full text-[10px] font-black">{{ $project->screenshots->count() }}</span>
                        </h3>

                        @if($project->screenshots->count())
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($project->screenshots as $shot)
                                    <a href="{{ asset('storage/'.$shot->image) }}" target="_blank" class="group relative aspect-video rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 shadow-sm block">
                                        <img src="{{ asset('storage/'.$shot->image) }}" alt="Screenshot {{ $loop->iteration }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                        <div class="absolute inset-0 bg-slate-900/10 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                            <span class="bg-white/90 backdrop-blur-sm p-2 rounded-xl shadow text-xs font-bold text-slate-700">Buka ↗</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl border border-dashed border-slate-200 p-8 text-center text-xs text-slate-400">
                                Belum ada screenshot tambahan untuk project ini.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:sticky lg:top-6 space-y-6">
                    
                    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-5">
                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider pb-3 border-b border-slate-50">Informasi Portofolio</h3>
                        
                        <div class="space-y-4 text-xs">
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-400 font-medium">👤 Pembuat</span>
                                <span class="font-bold text-slate-800">{{ optional($project->user)->name ?? 'Anonim' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-400 font-medium">📦 Versi</span>
                                <span class="font-bold text-slate-700 bg-slate-100 px-2 py-0.5 rounded-md text-[10px]">{{ $project->version ?? 'v1.0.0' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-400 font-medium">📅 Tahun Rilis</span>
                                <span class="font-bold text-slate-800">{{ $project->year ?? '2026' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-0.5">
                                <span class="text-slate-400 font-medium">📥 Total Unduh</span>
                                <span class="font-bold text-slate-800 flex items-center gap-1">
                                    <span>{{ number_format($project->download_count ?? 0) }}</span> kali
                                </span>
                            </div>
                        </div>

                        <div class="pt-2 space-y-2.5">
                            <a href="{{ route('projects.download', $project->slug) }}" class="flex items-center justify-center w-full py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-sm shadow-blue-500/10">
                                📥 Download Source Code
                            </a>
                            
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="flex items-center justify-center w-full py-3 rounded-2xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200/50 font-bold text-xs transition">
                                    🌐 Lihat Demo Aplikasi
                                </a>
                            @endif

                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="flex items-center justify-center w-full py-3 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition shadow-sm">
                                    🐙 Buka Repositori GitHub
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-6 text-white shadow-sm shadow-blue-600/10 relative overflow-hidden group">
                        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-xl group-hover:scale-125 transition duration-500"></div>
                        <h4 class="text-xs font-black uppercase tracking-wider mb-2">Butuh Bantuan?</h4>
                        <p class="text-[11px] text-blue-100 leading-relaxed mb-4">Jika Anda mengalami kendala saat memasang atau menjalankan source code project ini, silakan hubungi pengembang.</p>
                        <a href="#" class="inline-flex items-center justify-center px-4 py-2 bg-white text-blue-600 font-bold text-[10px] rounded-xl shadow hover:bg-blue-50 transition">
                            Hubungi Pembuat
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection