<section class="relative bg-[radial-gradient(100%_150%_at_100%_0%,rgba(219,234,254,0.45)_0%,rgba(255,255,255,0)_75%)] dark:bg-[radial-gradient(100%_150%_at_100%_0%,rgba(30,58,138,0.15)_0%,rgba(15,23,42,0)_75%)] dark:bg-slate-950 pt-16 pb-28 transition-colors duration-500 overflow-visible">
    
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 hidden md:block">
        <div class="absolute top-24 right-[46%] w-4 h-4 bg-blue-400/50 rounded-full blur-[0.5px] animate-bounce" style="animation-duration: 4s;"></div>
        <div class="absolute bottom-16 right-[42%] w-3 h-3 bg-blue-300/70 rounded-full animate-pulse"></div>
        <div class="absolute top-[35%] right-[4%] w-[18px] h-[18px] bg-blue-400/30 rounded-full blur-[1px]"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        
        <div class="lg:col-span-6 flex flex-col justify-center">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-xs font-bold bg-blue-50 text-blue-600 dark:bg-blue-950/50 dark:text-blue-400 mb-6 border border-blue-100/80 dark:border-blue-900/40 w-fit shadow-sm hover:bg-blue-100 transition duration-300 cursor-default">
                🎓 Platform Berbagi Project Siswa
            </span>
            
            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-slate-100 tracking-tight leading-[1.15] mb-6">
                Temukan Project Terbaik, <br>
                <span class="text-blue-600 dark:text-blue-400">Bagikan Karyamu</span>, <br>
                Menginspirasi Semua Orang.
            </h1>
            
            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed mb-8 max-w-lg">
                SkillStore adalah platform untuk mempublikasikan hasil project, berbagi karya terbaik, serta belajar dari project siswa lainnya.
            </p>
            
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#katalog-section" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-white bg-blue-600 hover:bg-blue-700 transition-all duration-300 gap-2 shadow-lg shadow-blue-600/20 hover:shadow-xl hover:shadow-blue-600/35 transform hover:-translate-y-1">
                    Jelajahi Project
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
                
                @guest
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-blue-600 bg-white dark:bg-slate-900 transition-all duration-300 border border-blue-200 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/80 gap-2 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                        Upload Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                    </a>
                @else
                    <a href="{{ route('dashboard.projects.create') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-blue-600 bg-white dark:bg-slate-900 transition-all duration-300 border border-blue-200 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800/80 gap-2 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                        Upload Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                    </a>
                @endguest
            </div>

            <div class="flex items-center gap-3 border-t border-slate-100 dark:border-slate-900 pt-6 w-fit">
                <div class="flex -space-x-2 overflow-hidden">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-950 object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-950 object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-950 object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-950 object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                    Bergabung dengan <span class="font-bold text-slate-800 dark:text-slate-200">500+ siswa</span><br>dan bagikan project terbaikmu 🚀
                </p>
            </div>
        </div>

        <div class="lg:col-span-6 flex items-center justify-center relative min-h-[320px] lg:min-h-[440px]">
            <div class="absolute w-72 h-72 bg-blue-400/10 dark:bg-blue-500/5 rounded-full blur-3xl -z-10 animate-pulse"></div>
            
            <img src="{{ asset('images/3mode.png') }}" 
                alt="SkillStore Mascot" 
                class="w-full max-w-[420px] lg:max-w-[490px] h-auto object-contain transition-transform duration-500 ease-out transform hover:scale-105
                        drop-shadow-[0_15px_30px_rgba(59,130,246,0.12)] dark:drop-shadow-[0_20px_35px_rgba(0,0,0,0.45)]">
        </div>

    </div>
</section>