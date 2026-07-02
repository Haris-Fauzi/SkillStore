<nav class="sticky top-0 z-50 bg-white/90 dark:bg-slate-900 transition-colors duration-300 backdrop-blur-md border-b border-slate-100">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            
            <div class="flex items-center gap-2 flex-shrink-0">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-black text-white text-lg">S</div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 transition-colors duration-300">Skill<span class="text-blue-600">Store</span></span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="{{ route('home') }}" class="text-blue-600 border-b-2 border-blue-600 pb-1">Beranda</a>
                <a href="#Project" class="hover:text-slate-900 dark:text-slate-100 transition-colors duration-300 transition">Project</a>
                <a href="#Category" class="hover:text-slate-900 dark:text-slate-100 transition-colors duration-300 transition">Kategori</a>
                <a href="#Featured" class="hover:text-slate-900 dark:text-slate-100 transition-colors duration-300 transition">Leaderboard</a>
                <a href="#About" class="hover:text-slate-900 dark:text-slate-100 transition-colors duration-300 transition">Tentang</a>
            </div>

            <div class="flex items-center gap-4 flex-1 max-w-xs md:max-w-sm justify-end">
                <form action="{{ route('projects.index') }}#Project" method="GET" class="relative w-full hidden sm:block">
                    <input type="text" name="search" placeholder="Cari project..." value="{{ request('search') }}" class="w-full pl-4 pr-10 py-2.5 text-xs bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 transition-colors duration-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                    <button type="submit" class="absolute right-3 top-3 text-slate-400 hover:text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </form>

                @guest
                    <a href="{{ route('login') }}" class="text-xs font-bold text-slate-700 hover:text-slate-900 dark:text-slate-100 transition-colors duration-300 transition px-3 py-2">Login</a>
                    <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/10 transition">Daftar</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-5 py-2.5 rounded-xl transition">Dashboard</a>
                @endguest
            </div>

            <button 
                x-data="{ darkMode: document.documentElement.classList.contains('dark') }"
                x-on:click="
                    darkMode = !darkMode;
                    if (darkMode) {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                "
                class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 transition"
            >
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode">☀️</span>
            </button>
            
        </div>
    </div>
</nav>