<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Upload Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <h2 class="text-2xl font-bold">
                    Upload Project
                </h2>

                <form action="{{ route('dashboard.projects.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @include('dashboard.projects.partials.form')

                </form>

            </div>

        </div>
    </div>
</x-app-layout>