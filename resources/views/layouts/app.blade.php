<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SkillStore') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon S.svg') }}">
    </head>
    <body class="font-sans antialiased">
        {{-- PERUBAHAN: Mengubah bg-gray-100 menjadi bg-slate-50/50 dan dark mode ke slate-950 --}}
        <div class="min-h-screen bg-slate-50/50 dark:bg-slate-950 transition-colors duration-300">
            @include('layouts.navigation')

            @isset($header)
                {{-- PERUBAHAN: Menyesuaikan border dan background header agar seirama dengan Workspace --}}
                <header class="bg-white dark:bg-slate-900 border-b border-slate-100 dark:border-slate-800/80 shadow-sm">
                    <div class="max-w-[1400px] mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>