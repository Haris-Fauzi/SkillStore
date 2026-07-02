<section class="py-20">

    <div class="max-w-[1400px] mx-auto px-6">

        <div class="text-center mb-14">

            <span class="text-blue-600 font-semibold">

                TERBARU

            </span>

            <h2 class="mt-2 text-4xl font-bold text-slate-900 dark:text-slate-100 transition-colors duration-300">

                Upload Terbaru

            </h2>

            <p class="mt-4 text-slate-500 dark:text-slate-400 transition-colors duration-300">

                Project yang baru dipublikasikan oleh komunitas.

            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($latestProjects as $project)

                <div class="bg-white dark:bg-slate-950 transition-colors duration-300 rounded-3xl p-6 border border-slate-200 dark:border-slate-700 transition-colors duration-300 shadow-sm dark:border-slate-800 hover:shadow-xl hover:-translate-y-1 transition">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">

                            📦

                        </div>

                        <div>

                            <h3 class="font-bold text-slate-900 dark:text-slate-100 transition-colors duration-300 line-clamp-1">

                                {{ $project->title }}

                            </h3>

                            <p class="text-sm text-slate-500 dark:text-slate-400 transition-colors duration-300">

                                {{ $project->user->name }}

                            </p>

                        </div>

                    </div>

                    <p class="mt-5 text-slate-500 dark:text-slate-400 transition-colors duration-300 line-clamp-3">

                        {{ $project->description }}

                    </p>

                    <div class="mt-6 flex items-center justify-between">

                        <span class="text-blue-600 text-sm font-semibold">

                            {{ $project->category->category_name }}

                        </span>

                        <span class="text-slate-400 text-sm">

                            {{ $project->created_at->diffForHumans() }}

                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>