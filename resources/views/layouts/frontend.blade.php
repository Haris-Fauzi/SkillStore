<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SkillStore') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
    
    {{-- Pengaman kustom jika class line-clamp bawaan belum ter-load & custom scrollbar --}}
    <style>
        .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        
        /* Modifikasi Scrollbar Premium agar menyatu dengan warna Workspace */
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: transparent; }
        .dark ::-webkit-scrollbar-thumb { background: rgba(30, 41, 59, 0.5); border-radius: 10px; border: 2px solid #020617; }
        ::-webkit-scrollbar-thumb { background: rgba(203, 213, 225, 1); border-radius: 10px; border: 2px solid #F6FAFF; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(148, 163, 184, 1); }
    </style>

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon S.svg') }}">
</head>

<script>
    // Cek apakah user sudah pernah memilih mode gelap sebelumnya
    if (localStorage.getItem('theme') === 'dark' || 
       (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>

{{-- MODIFIKASI: Menambahkan transisi warna global pada body agar perubahan tema berjalan sangat halus --}}
<body
    class="min-h-screen bg-[#F6FAFF] dark:bg-slate-950 text-slate-800 dark:text-slate-200 antialiased transition-colors duration-300"
    style="font-family:'Plus Jakarta Sans',sans-serif;">

    @yield('content')

</body>

</html>