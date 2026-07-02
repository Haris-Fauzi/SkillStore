<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    
    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kategori <span class="text-rose-500">*</span></label>
        <select name="category_id" 
                class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('category_id') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition bg-white">
            <option value="">Pilih kategori project</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $project->category_id ?? '') == $category->id)>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Judul Project <span class="text-rose-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}" placeholder="Contoh: Aplikasi E-Commerce Berbasis Laravel"
               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('title') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
        @error('title')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Deskripsi Project <span class="text-rose-500">*</span></label>
        <textarea name="description" rows="5" placeholder="Jelaskan fitur utama, teknologi yang digunakan, dan cara instalasi project kamu..."
                  class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('description') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Versi Aplikasi</label>
        <input type="text" name="version" placeholder="1.0.0" value="{{ old('version', $project->version ?? '1.0.0') }}"
               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('version') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
        @error('version')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tahun Pembuatan <span class="text-rose-500">*</span></label>
        <input type="number" name="year" placeholder="Format: YYYY (Contoh: 2026)" value="{{ old('year', $project->year ?? date('Y')) }}"
               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('year') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
        @error('year')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">GitHub Repository URL <span class="text-rose-500">*</span></label>
        <input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}" placeholder="https://github.com/username/repository"
               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('github_url') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
        @error('github_url')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Live Demo URL (Opsional)</label>
        <input type="url" name="demo_url" value="{{ old('demo_url', $project->demo_url ?? '') }}" placeholder="https://project-demo.example.com"
               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('demo_url') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
        @error('demo_url')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2 border border-slate-100 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl">
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Cover Thumbnail @if(!isset($project)) <span class="text-rose-500">*</span> @endif</label>
        @if(isset($project) && $project->thumbnails)
            <div class="mb-3">
                <img src="{{ asset('storage/'.$project->thumbnails) }}" class="w-32 h-20 object-cover rounded-xl border border-slate-200 dark:border-slate-700 transition-colors duration-300 shadow-sm dark:border-slate-800" alt="Current Thumbnail">
                <p class="text-[10px] text-slate-400 mt-1">💡 Biarkan kosong jika tidak ingin mengubah cover utama.</p>
            </div>
        @endif
        <input type="file" name="thumbnails" accept="image/*"
               class="w-full text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition cursor-pointer">
        @error('thumbnails')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    @if(isset($project) && $project->screenshots->count())
        <div class="md:col-span-2 border border-slate-100 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl">
            <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-3">Screenshot Saat Ini</label>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                @foreach($project->screenshots as $screenshot)
                    <div class="rounded-xl border border-slate-200 dark:border-slate-700 transition-colors duration-300 overflow-hidden bg-white dark:bg-slate-950 transition-colors duration-300 shadow-sm dark:border-slate-800 group relative">
                        <img src="{{ asset('storage/'.$screenshot->image) }}" class="w-full h-24 object-cover">
                        <button type="button" onclick="deleteScreenshot({{ $screenshot->id }})"
                                class="w-full bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold py-1.5 text-[10px] transition border-t border-slate-100">
                            🗑️ Hapus Foto
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="md:col-span-2 border border-slate-100 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl">
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Foto Screenshot Aplikasi (Opsional)</label>
        <input type="file" name="screenshots[]" multiple accept="image/*"
               class="w-full text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition cursor-pointer">
        <p class="text-[10px] text-slate-400 mt-1">💡 Kamu bisa memilih lebih dari satu gambar sekaligus untuk galeri pameran.</p>
        @error('screenshots')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2 border border-slate-100 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl">
        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">File Source Code (.zip / .rar) @if(!isset($project)) <span class="text-rose-500">*</span> @endif</label>
        @if(isset($project) && $project->file_project)
            <div class="mb-2 flex items-center gap-2 p-2 bg-white dark:bg-slate-950 transition-colors duration-300 rounded-xl border border-slate-100 max-w-md">
                <span class="text-xs">📦</span>
                <span class="text-[11px] font-medium text-slate-600 truncate">{{ basename($project->file_project) }}</span>
            </div>
        @endif
        <input type="file" name="file_project"
               class="w-full text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition cursor-pointer">
        @error('file_project')
            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
        <a href="{{ route('dashboard.projects.index') }}"
           class="inline-flex items-center justify-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
            Batal
        </a>
        <button type="submit"
                class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm dark:border-slate-800 shadow-blue-500/10">
            {{ isset($project) ? '⚡ Perbarui Project' : '🚀 Simpan & Publikasikan' }}
        </button>
    </div>

</div>