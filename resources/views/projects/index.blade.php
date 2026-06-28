@php
    use Illuminate\Support\Str;
@endphp

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Katalog Project
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-4">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-3xl font-bold">
                    Katalog Project
                </h1>

                <form method="GET"
                    action="{{ route('projects.index') }}">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari project..."
                        class="rounded-lg border-gray-300">

                </form>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @forelse($projects as $project)

    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden flex flex-col h-full">

        {{-- Thumbnail --}}
        @if($project->thumbnails)
            <img
                src="{{ asset('storage/'.$project->thumbnails) }}"
                alt="{{ $project->title }}"
                class="w-full h-44 object-cover">
        @else
            <div class="w-full h-44 bg-gray-200 flex items-center justify-center text-gray-500">
                No Image
            </div>
        @endif

        {{-- Body --}}
        <div class="p-4 flex flex-col flex-1">

            <span class="text-xs text-purple-600 font-semibold">
                {{ $project->category->category_name }}
            </span>

            <h2 class="mt-2 text-lg font-bold line-clamp-2">
                {{ $project->title }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 line-clamp-3">
                {{ $project->description }}
            </p>

            <div class="mt-4 space-y-1 text-sm text-gray-500">

                <div>
                    👤 {{ $project->user->name }}
                </div>

                <div>
                    📦 v{{ $project->version }}
                </div>

                <div>
                    📅 {{ $project->year }}
                </div>

                <div>
                    📥 {{ number_format($project->download_count) }} Download
                </div>

            </div>

            {{-- Tombol --}}
            <div class="mt-4 flex gap-2">

    <a href="{{ route('projects.show', $project->slug) }}"
        class="flex-1 rounded-lg bg-purple-600 px-3 py-2 text-center text-sm font-medium text-black hover:bg-purple-700">

        Detail

    </a>

    <a href="{{ route('projects.download', $project->slug) }}"
        class="flex-1 rounded-lg border border-blue-600 px-3 py-2 text-center text-sm font-medium text-blue-600 hover:bg-blue-600 hover:text-white">

        Download

    </a>

</div>

        </div>

    </div>

    @empty

    <div class="col-span-full text-center py-20 text-gray-500">

        Belum ada project yang dipublikasikan.

    </div>

    @endforelse

</div>

            <div class="mt-8">

                {{ $projects->links() }}

            </div>
        </div>
    </div>
</x-app-layout>

<style>
.line-clamp-2{
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.line-clamp-3{
    display:-webkit-box;
    -webkit-line-clamp:3;
    -webkit-box-orient:vertical;
    overflow:hidden;
}
</style>