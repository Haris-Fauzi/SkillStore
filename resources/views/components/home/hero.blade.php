<section class="relative overflow-hidden 
    /* Light Mode */
    bg-gradient-to-b from-blue-50/30 via-slate-50 to-slate-50 
    /* Dark Mode */
    dark:from-blue-950/20 dark:via-slate-950 dark:to-slate-950 
    pt-16 pb-20 transition-colors duration-500">
    
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <!-- Sisi Kiri -->
        <div class="relative z-10">
            <span class="inline-flex items-center gap-1.5 py-1.5 px-4 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 mb-6 border border-blue-100">
                🎓 Platform Berbagi Project Siswa
            </span>
            <h1 class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight leading-[1.15] mb-6">
                Temukan Project Terbaik, <br>
                <span class="text-blue-600">Bagikan Karyamu</span>, <br>
                Menginspirasi Semua Orang.
            </h1>
            <p class="text-slate-500 dark:text-slate-400 transition-colors duration-300 text-sm leading-relaxed mb-8 max-w-md">
                SkillStore adalah platform untuk mempublikasikan hasil project, berbagi karya terbaik, serta belajar dari project siswa lainnya.
            </p>
            
            <!-- Tombol Aksi -->
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="#katalog-section" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-white bg-blue-600 hover:bg-blue-700 transition gap-2 shadow-lg shadow-blue-500/20">
                    Jelajahi Project
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </a>
                @guest
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-blue-600 bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-200 dark:border-slate-700 transition-colors duration-300 hover:bg-slate-50 dark:bg-slate-800 transition gap-2 shadow-sm dark:border-slate-800">
                        Upload Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                    </a>
                @else
                    <a href="{{ route('dashboard.projects.create') }}" class="inline-flex items-center justify-center px-6 py-3 rounded-xl font-bold text-xs text-blue-600 bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-200 dark:border-slate-700 transition-colors duration-300 hover:bg-slate-50 dark:bg-slate-800 transition gap-2 shadow-sm dark:border-slate-800">
                        Upload Project
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                    </a>
                @endguest
            </div>

            <!-- Anggota Bergabung Ring -->
            <div class="flex items-center gap-3 border-t border-slate-100 pt-6 w-fit">
                <div class="flex -space-x-2.5 overflow-hidden">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                    <img class="inline-block h-8 w-8 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80" alt="Siswa">
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300 font-medium">
                    Bergabung dengan <span class="font-bold text-slate-800 dark:text-slate-200">500+ siswa</span><br>dan bagikan project terbaikmu 🚀
                </p>
            </div>
        </div>

       <!-- Bagian Kanan Hero (Tempat Maskot 3D Anda) -->
<div class="flex-1 flex items-center justify-center relative min-h-[300px] md:min-h-[400px]">
    <!-- Lingkaran dekorasi estetik di belakang maskot -->
    <div class="absolute w-72 h-72 bg-blue-100/50 rounded-full blur-2xl -z-10 animate-pulse"></div>
    
    <!-- Maskot 3D Baru Anda -->
    <img src="{{ asset('images/3mode.png') }}" 
         alt="SkillStore Mascot" 
         class="w-full max-w-sm md:max-w-md h-auto object-contain drop-shadow-xl transform hover:scale-105 transition duration-500">
</div>

    </div>
</section>