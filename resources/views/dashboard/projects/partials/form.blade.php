                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-medium mb-2">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="w-full rounded-lg border-gray-300">

                                <option value="">Pilih kategori</option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        @selected(old('category_id', $project->category_id ?? '') == $category->id)>
                                        {{ $category->category_name }}
                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                Judul Project
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title', $project->title ?? '') }}"
                                class="w-full rounded-lg border-gray-300">

                        </div>

                        <div class="md:col-span-2">

                            <label class="block font-medium mb-2">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                class="w-full rounded-lg border-gray-300">{{ old('description', $project->description ?? '') }}</textarea>

                        </div>

                        <div>

                            <label class="block font-medium mb-2">
                                Versi
                            </label>

                            <input
                                type="text"
                                name="version"
                                placeholder="1.0.0"
                                value="{{ old('version', '1.0.0') }}"
                                class="w-full rounded-lg border-gray-300">

                        </div>

                        <div>

                            <label class="block font-medium mb-2">
                                Tahun
                            </label>

                            <input
                                type="number"
                                name="year"
                                value="{{ old('year', $project->year ?? '') }}"
                                class="w-full rounded-lg border-gray-300">

                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                GitHub URL
                            </label>

                            <input
                                type="url"
                                name="github_url"
                                value="{{ old('github_url', $project->github_url ?? '') }}"
                                class="w-full rounded-lg border-gray-300"
                                placeholder="https://github.com/username/project">
                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                Demo URL
                            </label>

                            <input
                                type="url"
                                name="demo_url"
                                value="{{ old('demo_url', $project->demo_url ?? '') }}"
                                class="w-full rounded-lg border-gray-300"
                                placeholder="https://example.com">
                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                Thumbnails
                            </label>
                            @if(isset($project) && $project->thumbnails)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$project->thumbnails) }}"
                                        class="w-40 rounded border"
                                        alt="Thumbnail Project">
                                </div>
                            @endif

                            <input
                                type="file"
                                name="thumbnails"
                                accept="image/*"
                                class="w-full rounded-lg border-gray-300">
                        </div>

                        @if(isset($project) && $project->screenshots->count())

                            <div class="md:col-span-2">

                                <label class="block font-medium mb-3">
                                    Screenshot Saat Ini
                                </label>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                                    @foreach($project->screenshots as $screenshot)

                                        <div class="rounded-lg border overflow-hidden">

                                            <img
                                                src="{{ asset('storage/'.$screenshot->image) }}"
                                                class="w-full h-32 object-cover">

                                            <button
                                                type="button"
                                                class="w-full bg-red-600 text-white py-2 text-sm"
                                                onclick="deleteScreenshot({{ $screenshot->id }})">

                                                Hapus

                                            </button>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endif

                        <div class="md:col-span-2">

                            <label class="block font-medium mb-2">
                                Tambah Screenshot
                            </label>

                            <input
                                type="file"
                                name="screenshots[]"
                                multiple
                                accept="image/*"
                                class="w-full rounded-lg border-gray-300">

                        </div>

                        <div>
                            <label class="block font-medium mb-2">
                                File Project
                            </label>

                            @if(isset($project) && $project->file_project)
                                <p class="mb-2 text-sm text-gray-500">
                                    File saat ini:
                                    {{ basename($project->file_project) }}
                                </p>
                            @endif

                            <input
                                type="file"
                                name="file_project"
                                class="w-full rounded-lg border-gray-300">
                        </div>

                        <div class="md:col-span-2 flex justify-end gap-3">

                            <a href="{{ route('dashboard.projects.index') }}"
                                class="rounded-lg bg-gray-500 px-4 py-2 text-white hover:bg-gray-600">

                                Batal

                            </a>

                            <button
                                type="submit"
                                class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">

                                {{ isset($project) ? 'Update Project' : 'Simpan Project' }}

                            </button>

                        </div>

                    </div>