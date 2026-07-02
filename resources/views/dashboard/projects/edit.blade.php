@extends('layouts.frontend')

@section('content')
<div class="bg-white dark:bg-slate-950 transition-colors duration-300 border-b border-slate-100 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90 dark:bg-slate-900 transition-colors duration-300">
    <div class="max-w-[1400px] mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                S
            </div>
            <span class="text-xs font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight">
                SkillStore <span class="text-blue-600 font-medium bg-blue-50 px-2 py-0.5 rounded-md ml-1">Workspace</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard.projects.index') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                📦 Manajemen Project
            </a>
            <span class="text-slate-200">|</span>
            <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                📊 Dashboard
            </a>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50 dark:bg-slate-800/50 min-h-[90vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 rounded-3xl shadow-sm dark:border-slate-800 overflow-hidden p-6 sm:p-8">
            <div class="mb-6 border-b border-slate-100 pb-4 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-lg flex-shrink-0">
                    ✏️
                </div>
                <div>
                    <h3 class="text-base font-black text-slate-800 dark:text-slate-200 tracking-tight">Form Pembaruan Project</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Perbarui informasi, perbaiki bug, atau perbarui file source code project kamu.</p>
                </div>
            </div>

            <form action="{{ route('dashboard.projects.update', $project) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('dashboard.projects.partials.form')
            </form>

            {{-- Hidden Form untuk menghapus galeri screenshot secara asynchronous --}}
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