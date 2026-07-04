<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-14 pb-4">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-xl font-black text-slate-900 dark:text-slate-100 tracking-tight transition-colors duration-300">Kategori Populer</h2>
        <a href="#" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950/40 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white py-2 px-4 rounded-xl shadow-sm hover:shadow-md hover:shadow-blue-500/20 transition-all duration-300 transform hover:-translate-y-0.5">
            Lihat Semua Kategori ➔
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
        @php
            $categories = [
                ['name' => 'Web Development', 'icon' => '🌐'],
                ['name' => 'Android', 'icon' => '🤖'],
                ['name' => 'Desktop', 'icon' => '💻'],
                ['name' => 'Machine Learning', 'icon' => '🧠'],
                ['name' => 'IoT', 'icon' => '📟'],
                ['name' => 'Game', 'icon' => '🎮'],
                ['name' => 'UI/UX Design', 'icon' => '✒️'],
                ['name' => 'Lainnya', 'icon' => '░'],
            ];
        @endphp

        @foreach($categories as $category)
        <a href="#" class="flex flex-col items-center justify-center p-5 
            bg-white/80 dark:bg-slate-900/80 backdrop-blur-sm
            border border-slate-200/60 dark:border-slate-800/80 
            /* Shadow awal yang sangat soft */
            shadow-[0_4px_20px_-4px_rgba(0,0,0,0.2)] dark:shadow-none
            /* Efek transisi ketika di-hover (Timbul & Hidup) */
           hover:shadow-[0_20px_40px_-10px_rgba(59,130,246,0.28)] dark:hover:shadow-[0_25px_50px_-12px_rgba(0,0,0,0.75)]
            transform hover:-translate-y-1.5
            hover:border-blue-500/50 dark:hover:border-blue-500/40 
            rounded-2xl transition-all duration-300 text-center group">
            
            <div class="w-12 h-12 flex items-center justify-center rounded-xl 
                bg-blue-50 dark:bg-blue-950/40 
                text-blue-600 dark:text-blue-400 
                text-xl mb-3.5 
                /* Efek mikro pada ikon saat card induk di-hover */
                group-hover:bg-blue-600 group-hover:text-white 
                group-hover:shadow-lg group-hover:shadow-blue-500/20
                transition-all duration-300 transform group-hover:scale-105">
                <span class="transition-transform duration-300 group-hover:scale-110">{{ $category['icon'] }}</span>
            </div>
            
            <span class="text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 tracking-tight">
                {{ $category['name'] }}
            </span>
        </a>
        @endforeach
    </div>
</div>