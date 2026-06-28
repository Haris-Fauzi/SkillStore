<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white rounded-xl shadow overflow-hidden">

                @if($project->thumbnails)
                    <img
                        src="{{ asset('storage/'.$project->thumbnails) }}"
                        class="w-full h-80 object-cover">
                @endif

                <div class="p-8">

                    <h1 class="text-3xl font-bold">
                        {{ $project->title }}
                    </h1>

                    <div class="mt-4 text-gray-600 space-y-2">

                        <p>
                            <strong>Kategori :</strong>
                            {{ optional($project->category)->category_name }}
                        </p>

                        <p>
                            <strong>Versi :</strong>
                            {{ $project->version }}
                        </p>

                        <p>
                            <strong>Tahun :</strong>
                            {{ $project->year }}
                        </p>

                        <p>
                            <strong>Pembuat :</strong>
                            {{ optional($project->user)->name }}
                        </p>

                        <p>
                            <strong>Download :</strong>
                            {{ number_format($project->download_count) }}
                        </p>

                    </div>

                    <div class="mt-8">

                        <h3 class="font-bold text-lg">
                            Deskripsi
                        </h3>

                        <p class="mt-3 whitespace-pre-line">
                            {{ $project->description }}
                        </p>

                    </div>

                    @if($project->screenshots->count())

                        <div class="mt-8">

                            <h3 class="text-xl font-semibold mb-4">
                                Screenshot Project
                                ({{ $project->screenshots->count() }})
                            </h3>

                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                                @foreach($project->screenshots as $shot)

                                    <a
                                        href="{{ asset('storage/'.$shot->image) }}"
                                        target="_blank">

                                        <img
                                            src="{{ asset('storage/'.$shot->image) }}"
                                            alt="Screenshot {{ $loop->iteration }}"
                                            class="w-full h-52 object-cover rounded-lg shadow hover:scale-105 transition duration-300">

                                    </a>

                                @endforeach

                            </div>

                        </div>

                    @else

                    <div class="mt-8">

                        <div class="rounded-lg border border-dashed p-6 text-center text-gray-500">

                            Belum ada screenshot project.

                        </div>

                    </div>

                    @endif

                    <div class="mt-8 flex gap-3">

                        @if($project->github_url)

                            <a
                                href="{{ $project->github_url }}"
                                target="_blank"
                                class="rounded-lg bg-gray-800 px-5 py-2 text-white">

                                GitHub

                            </a>

                        @endif

                        @if($project->demo_url)

                            <a
                                href="{{ $project->demo_url }}"
                                target="_blank"
                                class="rounded-lg bg-green-600 px-5 py-2 text-white">

                                Demo

                            </a>

                        @endif

                        <a
                            href="{{ route('projects.download',$project->slug) }}"
                            class="rounded-lg bg-blue-600 px-5 py-2 text-white">

                            Download Project

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>