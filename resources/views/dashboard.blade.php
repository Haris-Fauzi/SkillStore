<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Selamat Datang, {{ auth()->user()->name }} 👋
                    </h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Anda berhasil login ke SkillStore.
                    </p>

                    <div class="mt-6 border rounded-lg p-4">

                        <p>
                            <strong>Nomor Induk :</strong>
                            {{ auth()->user()->identity_number }}
                        </p>

                        <p class="mt-2">
                            <strong>Email :</strong>
                            {{ auth()->user()->email }}
                        </p>

                        <p class="mt-2">
                            <strong>Role :</strong>
                            {{ ucfirst(auth()->user()->role) }}
                        </p>

                        <p class="mt-2">
                            <strong>Status :</strong>
                            {{ ucfirst(auth()->user()->status) }}
                        </p>

                    </div>

                </div>

                @if (! auth()->user()->hasCompletedProfile())

                    <div class="mt-6 rounded-lg border border-yellow-300 bg-yellow-50 p-4">

                        <h3 class="font-bold text-yellow-800">
                            ⚠ Profil Belum Lengkap
                        </h3>

                        <p class="mt-2 text-yellow-700">
                            Silakan lengkapi profil Anda agar dapat menggunakan seluruh fitur SkillStore.
                        </p>
                       <a href="{{ route('student-profile.edit') }}"
                            class="inline-block mt-3 rounded-lg bg-yellow-600 px-4 py-2 text-white hover:bg-yellow-700">
                            Lengkapi Profil
                        </a>

                    </div>

                @endif
            </div>
            <div class="mt-6 rounded-lg bg-white dark:bg-gray-800 shadow-sm p-6">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Quick Actions
                </h3>

                <div class="mt-4 flex flex-wrap gap-3">

                    @if (! auth()->user()->hasCompletedProfile())

                        <a href="{{ route('student-profile.edit') }}"
                            class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">

                            👤 Lengkapi Profil

                        </a>

                    @else

                        <a href="{{ route('profile.edit') }}"
                            class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">

                            👤 Edit Profil

                        </a>

                    @endif

                    <a href="{{ route('dashboard.projects.index') }}"
                        class="rounded-lg bg-green-600 px-4 py-2 text-white hover:bg-green-700">

                        📁 Project Saya

                    </a>

                    <a href="#"
                        class="rounded-lg bg-purple-600 px-4 py-2 text-white hover:bg-purple-700">

                        ⬆ Upload Project

                    </a>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
