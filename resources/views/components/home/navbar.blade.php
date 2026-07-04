<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 transition-all duration-300 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 shadow-sm shadow-blue-500/[0.03] dark:shadow-none">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            
            <!-- Logo Area -->
            <div class="flex items-center gap-2 flex-shrink-0">
            
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-black text-white text-lg shadow-md shadow-blue-600/20">S</div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-slate-100 transition-colors duration-300">Skill<span class="text-blue-600">Store</span></span>
            </div>

            <!-- Menu Navigasi -->
            <div class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-500 dark:text-slate-400">
                <a href="{{ route('home') }}" class="text-blue-600 border-b-2 border-blue-600 pb-1">Beranda</a>
                <a href="#Project" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">Project</a>
                <a href="#Category" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">Kategori</a>
                <a href="#Featured" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">Leaderboard</a>
                <a href="#About" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">Tentang</a>
            </div>

            <!-- Fitur Cari & Autentikasi -->
            <div class="flex items-center gap-4 flex-1 max-w-xs md:max-w-sm justify-end">
                <form action="{{ route('projects.index') }}#Project" method="GET" class="relative w-full hidden sm:block">
                    
                    <input type="text" name="search" placeholder="Cari project..." value="{{ request('search') }}" 
                        class="w-full pl-4 pr-10 py-2 text-xs bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700/80 rounded-xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 text-slate-800 dark:text-slate-200 placeholder-slate-400 font-medium">
                    <button type="submit" class="absolute right-3 top-2.5 text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
                </form>

                @guest
                    <a href="{{ route('login') }}" class="text-xs font-bold text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition px-2 py-2">Login</a>
                    
                    <a href="{{ route('register') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5 rounded-xl shadow-lg shadow-blue-500/10 hover:shadow-blue-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">Daftar</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 px-4 py-2.5 rounded-xl shadow-lg shadow-blue-500/10 hover:shadow-blue-500/20 transform hover:-translate-y-0.5 transition-all duration-200 cursor-pointer">Dashboard</a>
                @endguest
            </div>

            <!-- Dark Mode Switcher -->
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
                class="p-2 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200/60 dark:border-slate-700 text-xs shadow-sm hover:bg-slate-100 dark:hover:bg-slate-700 transition cursor-pointer"
            >
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode">☀️</span>
            </button>
            
        </div>
    </div>
</nav>