<footer class="bg-white dark:bg-slate-950 border-t border-slate-100 dark:border-slate-900/60 pt-8 pb-6 mt-16 transition-colors duration-300 relative overflow-hidden" id="About">
    
    <!-- Dekorasi Lingkaran Gradasi Super Halus -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/[0.01] dark:bg-blue-500/[0.005] rounded-full blur-3xl -z-10 pointer-events-none"></div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Grid Utama -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 xl:gap-12 mb-16">
            
            <!-- Kolom Brand & Deskripsi -->
            <div class="md:col-span-2 space-y-4">
                <div class="space-y-2.5">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-white text-base shadow-sm shadow-blue-600/10">S</div>
                        <span class="text-lg font-bold tracking-tight text-slate-800 dark:text-slate-200 transition-colors duration-300">
                            Skill<span class="text-blue-600">Store</span>
                        </span>
                    </div>
                    <!-- Badge Status Smooth -->
                    <div>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md text-[10px] font-medium bg-slate-50 dark:bg-slate-900 text-slate-600 dark:text-slate-400 border border-slate-100 dark:border-slate-800">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/80 animate-pulse"></span>
                            Platform Kreatif Siswa
                        </span>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed font-medium max-w-sm antialiased">
                    Wadah inkubasi untuk mempublikasikan, membagikan, dan menginsipirasi dunia melalui baris kode dan karya terbaik siswa Indonesia.
                </p>
            </div>

            <!-- Kolom Jelajahi -->
            <div>
                <h4 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider mb-5">Jelajahi</h4>
                <ul class="space-y-3 text-xs font-medium text-slate-500 dark:text-slate-400">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Beranda</a></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Katalog Project</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Kategori Populer</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Leaderboard Siswa</a></li>
                </ul>
            </div>

            <!-- Kolom Kontribusi -->
            <div>
                <h4 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider mb-5">Kontribusi</h4>
                <ul class="space-y-3 text-xs font-medium text-slate-500 dark:text-slate-400">
                    <li><a href="{{ route('dashboard.projects.create') }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Upload Project</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Panduan Publikasi</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Hubungi Kami</a></li>
                </ul>
            </div>

            <!-- Kolom Tentang Kami -->
            <div>
                <h4 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider mb-5">Tentang Kami</h4>
                <ul class="space-y-3 text-xs font-medium text-slate-500 dark:text-slate-400">
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Tentang SkillStore</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 block">Syarat & Ketentuan</a></li>
                </ul>
            </div>

        </div>

        <!-- Bagian Bawah Footer (Copyright & Sosial Media) -->
        <div class="border-t border-slate-100 dark:border-slate-900/60 pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs font-medium text-slate-400 dark:text-slate-500">
            <p class="antialiased">© {{ date('Y') }} SkillStore. Hak Cipta Dilindungi.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors duration-200">Instagram</a>
                <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors duration-200">GitHub</a>
                <a href="#" class="hover:text-slate-600 dark:hover:text-slate-300 transition-colors duration-200">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>