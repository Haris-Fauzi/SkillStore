@props(['featured', 'latest'])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 pb-24 grid grid-cols-1 lg:grid-cols-3 gap-8" id="Featured">
    
    <!-- SISI KIRI: Project Unggulan (Mengambil space 2 Kolom) -->
    <div class="lg:col-span-2">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-extrabold text-slate-900">Project Unggulan</h2>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1 py-1 px-3 text-xs font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                Lihat Semua ➔
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse($featured as $project)
                <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-video bg-slate-100">
                            @if($project->thumbnails)
                                <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-xs font-semibold text-slate-400 bg-slate-100">Gambar Tidak Tersedia</div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="px-2.5 py-1 text-[10px] font-bold text-blue-600 bg-blue-50 rounded-md uppercase">{{ $project->category->category_name ?? 'Web' }}</span>
                            <a href="{{ route('projects.show', $project->slug) }}" class="block text-sm font-bold text-slate-800 mt-2.5 hover:text-blue-600 transition line-clamp-2">
                                {{ $project->title }}
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-5 pt-0">
                        <div class="flex items-center justify-between border-t border-slate-50 pt-4 text-[11px] font-medium text-slate-400">
                            <div class="flex items-center gap-2">
                                <div class="w-5 h-5 rounded-full bg-slate-200 flex items-center justify-center text-[10px] text-slate-600 font-bold uppercase">{{ substr($project->user->name ?? 'U', 0, 1) }}</div>
                                <span class="text-slate-600 font-semibold truncate max-w-[80px]">{{ $project->user->name ?? 'Anonim' }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-0.5">👁️ 1.2K</span>
                                <span class="flex items-center gap-0.5">📥 {{ number_format($project->download_count) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-12 text-sm text-slate-400 bg-white rounded-2xl border border-dashed border-slate-200">Belum ada project unggulan.</div>
            @endforelse
        </div>
    </div>

    <!-- SISI KANAN: Project Terbaru (Mengambil space 1 Kolom) -->
    <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm self-start">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-extrabold text-slate-900">Project Terbaru</h2>
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-1 py-1 px-3 text-xs font-bold text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                Lihat Semua ➔
            </a>
        </div>

        <div class="space-y-4">
            @forelse($latest as $project)
                <div class="flex items-center gap-3.5 p-1.5 hover:bg-slate-50/80 rounded-xl transition group">
                    <div class="w-11 h-11 bg-blue-50 text-blue-600 rounded-xl flex flex-col items-center justify-center font-bold text-[10px] uppercase p-1 text-center group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                        <span>{{ substr($project->category->category_name ?? 'Web', 0, 3) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-xs font-bold text-slate-800 line-clamp-1 hover:text-blue-600 transition">{{ $project->title }}</a>
                        <p class="text-[11px] text-slate-400 font-medium mt-0.5">{{ $project->user->name ?? 'Siswa' }}</p>
                    </div>
                    <span class="text-[10px] text-slate-400 font-medium whitespace-nowrap">{{ $project->created_at ? $project->created_at->diffForHumans(null, true) : 'baru' }}</span>
                </div>
            @empty
                <div class="text-center py-8 text-xs text-slate-400">Belum ada project terbaru.</div>
            @endforelse
        </div>
    </div>

</div>