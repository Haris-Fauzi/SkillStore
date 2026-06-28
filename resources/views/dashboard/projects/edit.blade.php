<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Edit Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <h2 class="text-2xl font-bold">
                    Edit Project
                </h2>

                <form action="{{ route('dashboard.projects.update', $project) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @include('dashboard.projects.partials.form')

                </form>

                @foreach($project->screenshots as $screenshot)

                <form
                    id="delete-screenshot-{{ $screenshot->id }}"
                    action="{{ route('dashboard.projects.screenshots.destroy', $screenshot) }}"
                    method="POST"
                    class="hidden">

                    @csrf
                    @method('DELETE')

                </form>

                @endforeach

                <script>
                function deleteScreenshot(id) {

                    if (confirm('Hapus screenshot ini?')) {
                        document.getElementById('delete-screenshot-' + id).submit();
                    }

                }
                </script>

            </div>

        </div>
    </div>
</x-app-layout>