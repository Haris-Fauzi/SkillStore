@props(['featured', 'latest'])

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-16 pb-24 grid grid-cols-1 lg:grid-cols-3 gap-8" id="Featured">
    
    <!-- SISI KIRI: Project Unggulan (Mengambil space 2 Kolom) -->
    <div class="lg:col-span-2">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-extrabold text-slate-900 dark:text-slate-100 transition-colors duration-300">Project Unggulan</h2>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1 py-1 px-3 text-xs font-bold text-blue-600 dark:text-blue-300 bg-blue-50 dark:bg-blue-950/40 hover:bg-blue-100 rounded-lg transition">
                Lihat Semua ➔
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse($featured as $project)
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm dark:border-slate-800 hover:shadow-md transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-video bg-slate-100 dark:bg-slate-800">
                            @if($project->thumbnails)
                                <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-xs font-semibold text-slate-400 dark:text-slate-500 bg-slate-100 dark:bg-slate-800">Gambar Tidak Tersedia</div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="px-2.5 py-1 text-[10px] font-bold text-blue-600 dark:text-blue-300 bg-blue-50 dark:bg-blue-950/40 rounded-md uppercase">{{ $project->category->category_name ?? 'Web' }}</span>
                            <a href="{{ route('projects.show', $project->slug) }}" class="block text-sm font-bold text-slate-800 dark:text-slate-200 dark:text-slate-200 dark:text-slate-200 mt-2.5 hover:text-blue-600 dark:hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400 transition line-clamp-2">
                                {{ $project->title }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-5 pt-0">
                        <div class="flex items-center justify-between border-t border-slate-50 dark:border-slate-800 pt-4 text-[11px] font-medium text-slate-400 dark:text-slate-500">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-[10px] text-slate-600 dark:text-slate-200 font-bold uppercase">{{ substr($project->user->name ?? 'U', 0, 1) }}</div>
                                <span class="text-slate-600 dark:text-slate-300 font-semibold truncate max-w-[80px]">{{ $project->user->name ?? 'Anonim' }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-0.5">👁️ 1.2K</span>
                                <span class="flex items-center gap-0.5">📥 {{ number_format($project->download_count) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-sm text-slate-400 dark:text-slate-500 bg-white dark:bg-slate-900 rounded-2xl border border-dashed border-slate-200 dark:border-slate-700 transition-colors duration-300">Belum ada project unggulan.</div>
            @endforelse
        </div>
    </div>

    <!-- SISI KANAN: Project Terbaru (Mengambil space 1 Kolom) -->
    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-5 shadow-sm dark:border-slate-800 self-start">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-extrabold text-slate-900 dark:text-slate-100 transition-colors duration-300">Project Terbaru</h2>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1 py-1 px-3 text-xs font-bold text-blue-600 dark:text-blue-300 bg-blue-50 dark:bg-blue-950/40 hover:bg-blue-100 dark:hover:bg-blue-900/50 rounded-lg transition">
                Lihat Semua ➔
            </a>
        </div>

        <div class="space-y-4">
            @forelse($latest as $project)
                <div class="flex items-center gap-3.5 p-1.5 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-xl transition group">
                    <div class="w-11 h-11 bg-blue-50 dark:bg-blue-950/40 text-blue-600 rounded-xl flex flex-col items-center justify-center font-bold text-[10px] uppercase p-1 text-center group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <span>{{ substr($project->category->category_name ?? 'Web', 0, 3) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-xs font-bold text-slate-800 dark:text-slate-200 dark:text-slate-200 dark:text-slate-200 line-clamp-1 hover:text-blue-600 dark:hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400 transition">{{ $project->title }}</a>
                        <p class="text-[11px] text-slate-400 dark:text-slate-500 font-medium mt-0.5">{{ $project->user->name ?? 'Siswa' }}</p>
                    </div>
                    <span class="text-[10px] text-slate-400 dark:text-slate-500 font-medium whitespace-nowrap">{{ $project->created_at ? $project->created_at->diffForHumans(null, true) : 'baru' }}</span>
                </div>
            @empty
                <div class="text-center py-8 text-xs text-slate-400 dark:text-slate-500">Belum ada project terbaru.</div>
            @endforelse
        </div>
    </div>

</div>