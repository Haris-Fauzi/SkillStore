@props(['data'])

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 -mt-14 relative z-20">

    <div class="absolute inset-x-20 -top-10 h-32 bg-blue-500/10 dark:bg-blue-500/5 blur-3xl rounded-full -z-10 pointer-events-none"></div>

    <div class="bg-white/95 dark:bg-slate-900/95
            backdrop-blur-xl
            rounded-2xl
            border border-slate-200/60 dark:border-slate-800
            shadow-[0_12px_40px_-15px_rgba(0,0,0,0.20)] dark:shadow-[0_20px_50px_-12px_rgba(0,0,0,0.5)]
            p-4 md:p-5
            grid grid-cols-2 lg:grid-cols-4
            gap-4 md:gap-2
            divide-y-0 lg:divide-y-0 divide-x-0 lg:divide-x divide-slate-100 dark:divide-slate-800">
        
        <div class="flex items-center gap-4 lg:justify-center p-3 rounded-xl transition-all duration-300 hover:bg-slate-50/80 dark:hover:bg-slate-800/40 hover:-translate-y-1 hover:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.05)] group">
            <div class="p-3 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-xl shrink-0 shadow-sm border border-blue-100/30 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Project</p>
                <h3 class="text-xl md:text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5 tracking-tight">{{ number_format($data['projects'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500 flex items-center gap-0.5 mt-0.5">
                    ▲ 12% <span class="text-slate-400 dark:text-slate-500 font-normal ml-0.5">dari bulan lalu</span>
                </span>
            </div>
        </div>

        <div class="flex items-center gap-4 lg:justify-center p-3 rounded-xl transition-all duration-300 hover:bg-slate-50/80 dark:hover:bg-slate-800/40 hover:-translate-y-1 hover:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.05)] group lg:pl-4">
            <div class="p-3 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-xl shrink-0 shadow-sm border border-blue-100/30 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Download</p>
                <h3 class="text-xl md:text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5 tracking-tight">{{ number_format($data['downloads'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500 flex items-center gap-0.5 mt-0.5">
                    ▲ 18% <span class="text-slate-400 dark:text-slate-500 font-normal ml-0.5">dari bulan lalu</span>
                </span>
            </div>
        </div>

        <div class="flex items-center gap-4 lg:justify-center p-3 rounded-xl transition-all duration-300 hover:bg-slate-50/80 dark:hover:bg-slate-800/40 hover:-translate-y-1 hover:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.05)] group lg:pl-4">
            <div class="p-3 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-xl shrink-0 shadow-sm border border-blue-100/30 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Pengguna</p>
                <h3 class="text-xl md:text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5 tracking-tight">{{ number_format($data['members'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500 flex items-center gap-0.5 mt-0.5">
                    ▲ 8% <span class="text-slate-400 dark:text-slate-500 font-normal ml-0.5">dari bulan lalu</span>
                </span>
            </div>
        </div>

        <div class="flex items-center gap-4 lg:justify-center p-3 rounded-xl transition-all duration-300 hover:bg-slate-50/80 dark:hover:bg-slate-800/40 hover:-translate-y-1 hover:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.05)] group lg:pl-4">
            <div class="p-3 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-xl shrink-0 shadow-sm border border-blue-100/30 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider">Total Kategori</p>
                <h3 class="text-xl md:text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5 tracking-tight">{{ number_format($data['categories'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-blue-500 flex items-center gap-0.5 mt-0.5">
                    +2 <span class="text-slate-400 dark:text-slate-500 font-normal ml-0.5">kategori baru</span>
                </span>
            </div>
        </div>

    </div>
</div>