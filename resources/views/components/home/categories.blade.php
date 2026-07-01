<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16" id="Category">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-900">Kategori Populer</h2>
        <a href="#" class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 bg-blue-50 hover:bg-blue-100 py-1.5 px-3 rounded-lg transition">
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
        <a href="#" class="flex flex-col items-center justify-center p-4 bg-white border border-slate-100 hover:border-blue-500 hover:shadow-lg hover:shadow-blue-500/5 rounded-xl transition text-center group">
            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 text-xl mb-3 group-hover:bg-blue-600 group-hover:text-white transition">
                {{ $category['icon'] }}
            </div>
            <span class="text-xs font-semibold text-slate-700">{{ $category['name'] }}</span>
        </a>
        @endforeach
    </div>
</div>