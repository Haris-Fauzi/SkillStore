@extends('layouts.frontend')

@section('content')

<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 transition-all duration-300 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 shadow-sm shadow-blue-500/[0.03] dark:shadow-none">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between gap-4">
            
            <div class="flex items-center gap-2 flex-shrink-0">
                <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center font-bold text-white text-lg shadow-sm shadow-blue-600/10">S</div>
                <span class="text-xl font-bold tracking-tight text-slate-800 dark:text-slate-200 transition-colors duration-300">
                    Skill<span class="text-blue-600">Store</span>
                    <span class="text-blue-600 dark:text-blue-400 font-medium bg-blue-50 dark:bg-blue-950/60 px-2 py-0.5 rounded-md ml-1.5 border border-blue-100/30 dark:border-blue-900/30 text-[10px] uppercase tracking-wider align-middle">Workspace</span>
                </span>
            </div>

            <div class="flex items-center gap-5 flex-1 justify-end text-xs font-semibold">
                <a href="{{ route('dashboard.projects.index') }}" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-14L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Manajemen Project
                </a>
                <span class="text-slate-200 dark:text-slate-800">|</span>
                <a href="{{ route('dashboard') }}" class="text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150 flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    Dashboard
                </a>
            </div>
            
        </div>
    </div>
</nav>

{{-- Main Container Form --}}
<div class="py-12 bg-slate-50/50 dark:bg-slate-950 min-h-[90vh] transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl shadow-sm overflow-hidden p-6 sm:p-10 transition-all duration-300">
            
            <div class="mb-8 border-b border-slate-100 dark:border-slate-800/60 pb-5 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm shadow-blue-500/5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-tight">Form Pembaruan Project</h3>
                    <p class="text-xs font-medium text-slate-400 dark:text-slate-500 mt-0.5">Perbarui informasi, perbaiki bug, atau perbarui file source code project kamu.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.projects.update', $project) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Memanggil komponen partial form --}}
                @include('dashboard.projects.partials.form')
            </form>

            {{-- Hidden Form untuk menghapus galeri screenshot --}}
            @foreach($project->screenshots as $screenshot)
                <form id="delete-screenshot-{{ $screenshot->id }}"
                      action="{{ route('dashboard.projects.screenshots.destroy', $screenshot) }}"
                      method="POST"
                      class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach
        </div>

    </div>
</div>

<script>
    function deleteScreenshot(id) {
        if (confirm('Apakah kamu yakin ingin menghapus screenshot ini secara permanen dari database?')) {
            document.getElementById('delete-screenshot-' + id).submit();
        }
    }
</script>
@endsection