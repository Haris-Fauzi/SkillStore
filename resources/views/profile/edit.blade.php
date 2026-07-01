@extends('layouts.frontend')

@section('content')
<div class="bg-white border-b border-slate-100 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white text-xs font-black">
                S
            </div>
            <span class="text-xs font-black text-slate-900 tracking-tight">
                SkillStore <span class="text-blue-600 font-medium bg-blue-50 px-2 py-0.5 rounded-md ml-1">Workspace</span>
            </span>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition flex items-center gap-1">
                📊 Dashboard Utama
            </a>
            <span class="text-slate-200">|</span>
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 hover:text-blue-600 transition flex items-center gap-1">
                🏠 Beranda
            </a>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50/50 min-h-[90vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-xl shadow-sm shadow-blue-500/5">
                ⚙️
            </div>
            <div>
                <h2 class="text-lg font-black text-slate-900 tracking-tight">
                    Pengaturan Keamanan & Akun
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    Kelola informasi dasar akun, perbarui kata sandi, atau atur privasi keanggotaan Anda.
                </p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-6 sm:p-8 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-white border border-rose-100 bg-rose-50/10 rounded-3xl p-6 sm:p-8 shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</div>
@endsection