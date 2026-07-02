@props(['data'])

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
    <div class="bg-white dark:bg-slate-900 
            rounded-2xl 
            border border-slate-100 dark:border-slate-800 
            shadow-xl shadow-slate-200/40 dark:shadow-none 
            p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 2xl:grid-cols-5 
            divide-y sm:divide-y-0 sm:divide-x divide-slate-100 dark:divide-slate-800">
        
        <!-- Total Project -->
        <div class="flex items-center gap-4 p-3">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Project</p>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 mt-0.5">{{ number_format($data['projects'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500">+12% <span class="text-slate-400 font-normal">dari bulan lalu</span></span>
            </div>
        </div>

        <!-- Total Download -->
        <div class="flex items-center gap-4 p-3 sm:pl-6">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Download</p>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 mt-0.5">{{ number_format($data['downloads'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500">+18% <span class="text-slate-400 font-normal">dari bulan lalu</span></span>
            </div>
        </div>

        <!-- Total Pengguna -->
        <div class="flex items-center gap-4 p-3 lg:pl-6">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Pengguna</p>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 mt-0.5">{{ number_format($data['members'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-emerald-500">+8% <span class="text-slate-400 font-normal">dari bulan lalu</span></span>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="flex items-center gap-4 p-3 lg:pl-6">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            </div>
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Total Kategori</p>
                <h3 class="text-xl font-black text-slate-800 dark:text-slate-200 mt-0.5">{{ number_format($data['categories'] ?? 0) }}</h3>
                <span class="text-[10px] font-bold text-blue-600">+2 <span class="text-slate-400 font-normal">kategori baru</span></span>
            </div>
        </div>

    </div>
</div>