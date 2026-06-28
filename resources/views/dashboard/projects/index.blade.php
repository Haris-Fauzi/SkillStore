<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Project Saya
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Project Saya
                    </h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Anda memiliki <strong>{{ $projects->total() }}</strong> project.
                    </p>
                </div>

                <a href="{{ route('dashboard.projects.create') }}"
                    class="rounded-lg bg-purple-600 px-4 py-2 text-white hover:bg-purple-700">

                    + Upload Project

                </a>

            </div>

        </div>
    </div>
    @if ($projects->isEmpty())

        <div class="mt-6 rounded-lg border-2 border-dashed border-gray-300 p-10 text-center">

            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                Belum ada project
            </h3>

            <p class="mt-2 text-gray-500">
                Mulailah mengunggah project pertama Anda.
            </p>

        </div>
    @else
    <div class="mt-6 overflow-hidden rounded-lg bg-white shadow dark:bg-gray-800">

        <table class="min-w-full">

            <thead class="bg-gray-100 dark:bg-gray-700">

                <tr>
                    <th class="px-6 py-3 text-left">
                        Thumbnail
                    </th>

                    <th class="px-6 py-3 text-left">
                        Judul
                    </th>

                    <th class="px-6 py-3 text-left">
                        Kategori
                    </th>

                    <th class="px-6 py-3 text-left">
                        Status
                    </th>

                    <th class="px-6 py-3 text-left">
                        Terakhir Diperbarui
                    </th>

                    <th class="px-6 py-3 text-left">
                        Download
                    </th>

                    <th class="px-6 py-3 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach ($projects as $project)

                    <tr class="border-t">
                        <td class="px-6 py-4">

                            <img src="{{ asset('storage/' . $project->thumbnails) }}" alt="{{ $project->title }}" class="h-16 w-16 rounded-lg object-cover">

                        </td>

                        <td class="px-6 py-4">

                            {{ $project->title }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $project->category->category_name }}
                        </td>

                        <td class="px-6 py-4">

                            @if ($project->status === 'Published')
                                <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800">
                                    Published
                                </span>
                            @else
                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-800">
                                    Draft
                                </span>
                            @endif

                        </td>
                        <td class="px-6 py-4">

                        {{ $project->updated_at->diffForHumans() }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $project->download_count }}

                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('dashboard.projects.edit', $project) }}"
                                    class="rounded bg-blue-600 px-3 py-1 text-white hover:bg-blue-700">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('dashboard.projects.destroy', $project) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus project ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700">

                                        Delete

                                    </button>

                                </form>
                            </div>
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    @endif
</x-app-layout>