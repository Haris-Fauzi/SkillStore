<footer class="bg-white dark:bg-slate-950 border-t border-slate-100 dark:border-slate-800 py-12 mt-12 transition-colors duration-500" id="About">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
            
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-xl flex items-center justify-center font-black text-white text-base">S</div>
                    <span class="text-lg font-extrabold tracking-tight text-slate-900 dark:text-slate-100 transition-colors duration-300">Skill<span class="text-blue-600">Store</span></span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Platform terbaik untuk mempublikasikan, membagikan, dan menginspirasi melalui project kreatif siswa Indonesia.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider mb-4">Jelajahi</h4>
                <ul class="space-y-2.5 text-xs font-semibold text-slate-500 dark:text-slate-400 transition-colors duration-300">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a></li>
                    <li><a href="{{ route('projects.index') }}" class="hover:text-blue-600 transition">Katalog Project</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Kategori Populer</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Leaderboard Siswa</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider mb-4">Kontribusi</h4>
                <ul class="space-y-2.5 text-xs font-semibold text-slate-500 dark:text-slate-400 transition-colors duration-300">
                    <li><a href="{{ route('dashboard.projects.create') }}" class="hover:text-blue-600 transition">Upload Project Baru</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Panduan Publikasi</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Hubungi Kami</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-wider mb-4">Tentang Kami</h4>
                <ul class="space-y-2.5 text-xs font-semibold text-slate-500 dark:text-slate-400 transition-colors duration-300">
                    <li><a href="#" class="hover:text-blue-600 transition">Tentang SkillStore</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition">Syarat & Ketentuan</a></li>
                </ul>
            </div>

        </div>

        <div class="border-t border-slate-50 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] font-medium text-slate-400">
            <p>© {{ date('Y') }} SkillStore. Hak Cipta Dilindungi.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-slate-600 transition">Instagram</a>
                <a href="#" class="hover:text-slate-600 transition">GitHub</a>
                <a href="#" class="hover:text-slate-600 transition">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>