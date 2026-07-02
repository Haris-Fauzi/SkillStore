<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 mt-16" id="Category">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-900 dark:text-slate-100 transition-colors duration-300">Kategori Populer</h2>
        <a href="#" class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-950/30 hover:bg-blue-100 dark:hover:bg-blue-900/50 py-1.5 px-3 rounded-lg transition">
            Lihat Semua Kategori ➔
        </a>
    </div>

    <!-- Grid Kategori -->
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
        <!-- Template Item Kategori (Ganti SVG sesuai jenis kategori) -->
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
        <a href="#" class="flex flex-col items-center justify-center p-4 
            bg-white dark:bg-slate-900 
            border border-slate-100 dark:border-slate-800 
            hover:border-blue-500 dark:hover:border-blue-500 
            hover:shadow-lg hover:shadow-blue-500/5 
            rounded-xl transition text-center group">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl 
                bg-blue-50 dark:bg-slate-800 
                text-blue-600 dark:text-blue-400 
                text-xl mb-3 
                group-hover:bg-blue-600 group-hover:text-white 
                transition">
                {{ $category['icon'] }}
            </div>
            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300 transition-colors">
                {{ $category['name'] }}
            </span>
        </a>
        @endforeach
    </div>
</div>