@extends('layouts.frontend')

@section('content')

    {{-- 1. Navbar Utama --}}
    <x-home.navbar />

    {{-- 2. Hero Section --}}
    <x-home.hero />

    {{-- 3. Bar Statistik --}}
    <x-home.statistics :data="$statistics" />

    {{-- 4. Kategori Populer (Dipastikan posisinya berdiri sendiri di sini) --}}
    <div class="bg-white py-6">
        <x-home.categories />
    </div>

    {{-- 5. Bagian Grid Project Pilihan & Project Terbaru --}}
    <x-home.featured-project :featured="$featuredProjects" :latest="$latestProjects" />

    {{-- 6. Katalog Project (Explore Projects) --}}
    <section id="project-list" class="py-16 bg-slate-50/50 border-t border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8" id="Project">
                <h2 class="text-xl font-black text-slate-900">Katalog Project</h2>
                <p class="text-xs text-slate-500 mt-1">Jelajahi berbagai project terbaik yang telah dipublikasikan oleh siswa dan guru.</p>
            </div>

            {{-- Grid Responsif 4 Kolom Berjejer Rapi --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($projects as $project)
                    <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                        
                        <div>
                            {{-- Thumbnail Container --}}
                            <div class="relative aspect-video bg-slate-50 border-b border-slate-50 flex items-center justify-center overflow-hidden">
                                @if($project->thumbnails)
                                    <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-300 p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 stroke-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 002-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                
                                <span class="absolute top-3 left-3 px-2 py-0.5 text-[9px] font-bold text-blue-600 bg-white/90 backdrop-blur-sm rounded-md shadow-sm uppercase tracking-wider">
                                    {{ $project->category->category_name ?? 'Mobile' }}
                                </span>
                            </div>

                            {{-- Informasi Project --}}
                            <div class="p-4">
                                <a href="{{ route('projects.show', $project->slug) }}" class="block text-xs font-bold text-slate-800 hover:text-blue-600 transition line-clamp-1" title="{{ $project->title }}">
                                    {{ $project->title }}
                                </a>

                                <div class="grid grid-cols-2 gap-y-2 mt-4 text-[11px] font-medium text-slate-500 border-t border-slate-50 pt-3">
                                    <div class="flex items-center gap-1.5 truncate">
                                        <span>👤</span> 
                                        <span class="truncate font-semibold text-slate-700">{{ $project->user->name ?? 'Anonim' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 justify-end">
                                        <span>📦</span> <span>v1.0.0</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <span>📅</span> <span>{{ $project->created_at ? $project->created_at->format('Y') : '2026' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5 justify-end">
                                        <span>📥</span> <span>{{ number_format($project->download_count ?? 0) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Detail & Download --}}
                        <div class="p-4 pt-0 grid grid-cols-2 gap-2">
                            <a href="{{ route('projects.show', $project->slug) }}" class="inline-flex items-center justify-center py-2 rounded-xl bg-slate-50 hover:bg-slate-100 font-bold text-[10px] text-slate-700 border border-slate-200/60 transition">
                                Detail
                            </a>
                            <a href="{{ route('projects.download', $project->slug) }}" class="inline-flex items-center justify-center py-2 rounded-xl bg-blue-600 hover:bg-blue-700 font-bold text-[10px] text-white transition shadow-sm shadow-blue-500/10">
                                Download
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-xs text-slate-400 bg-white rounded-2xl border border-dashed border-slate-200">
                        Belum ada project yang dipublikasikan.
                    </div>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $projects->links() }}
            </div>

        </div>
    </section>

    {{-- 7. Footer Utama --}}
    <x-home.footer />

@endsection