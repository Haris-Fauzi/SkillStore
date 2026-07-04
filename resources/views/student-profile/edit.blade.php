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

            <div class="flex items-center gap-4 flex-1 justify-end text-xs font-semibold">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    Dashboard
                </a>
                <span class="text-slate-200 dark:text-slate-800">|</span>
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-blue-400 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Beranda Utama
                </a>
            </div>
            
        </div>
    </div>
</nav>

<div class="py-12 bg-slate-50/50 dark:bg-slate-950 min-h-screen transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 shadow-sm flex items-center gap-4 transition-all duration-300">
            <div class="w-10 h-10 bg-slate-50 dark:bg-slate-800/60 rounded-xl flex items-center justify-center text-slate-600 dark:text-slate-400 border border-slate-100 dark:border-slate-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-tight">Kelola Profil & Pengaturan Akun</h2>
                <p class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-medium">Lengkapi identitas akademi Anda serta kelola kredensial kata sandi secara berkala.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('student-profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Informasi Data Diri</h3>
                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5 font-medium">Data identitas utama yang akan ditampilkan pada portofolio Anda.</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-5 pb-4 border-b border-slate-50 dark:border-slate-800/40">
                    <div class="relative w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200/60 dark:border-slate-700/60 flex-shrink-0">
                        <img src="{{ isset($studentProfile) && $studentProfile->photo ? asset('storage/' . $studentProfile->photo) : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80' }}" class="w-full h-full object-cover" alt="Avatar">
                    </div>
                    <div class="space-y-1.5 text-center sm:text-left flex-1">
                        <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300">Unggah Foto Profil</label>
                        <input type="file" name="photo" accept="image/*" class="block w-full text-xs text-slate-500 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-semibold file:bg-blue-50 file:text-blue-600 dark:file:bg-blue-950/40 dark:file:text-blue-400 hover:file:bg-blue-100 transition cursor-pointer">
                        @error('photo') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Nomor Induk Siswa (NIS) <span class="text-rose-500">*</span></label>
                        <input type="text" name="nis" value="{{ old('nis', $studentProfile->nis ?? '') }}" required class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('nis') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200">
                        @error('nis') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('name') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200">
                        @error('name') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Kelas <span class="text-rose-500">*</span></label>
                        <input type="text" name="class" value="{{ old('class', $studentProfile->class ?? '') }}" 
                            placeholder="Contoh: XII RPL 2" required 
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('class') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('class') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Jurusan <span class="text-rose-500">*</span></label>
                        <input type="text" name="major" value="{{ old('major', $studentProfile->major ?? '') }}" 
                            placeholder="Contoh: Rekayasa Perangkat Lunak" required 
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('major') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('major') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">No. Telepon <span class="text-rose-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone', $studentProfile->phone ?? '') }}" 
                            placeholder="Contoh: 0812-3456-7890" required 
                            pattern="[0-9\-+ ]*"
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('phone') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50">
                        @error('phone') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Tanggal Lahir <span class="text-rose-500">*</span></label>
                        <input type="date" name="birth_date" 
                            value="{{ old('birth_date', isset($studentProfile->birth_date) ? \Carbon\Carbon::parse($studentProfile->birth_date)->format('Y-m-d') : '') }}" 
                            required 
                            class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('birth_date') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 [color-scheme:light] dark:[color-scheme:dark]">
                        @error('birth_date') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-1.5">Alamat Tempat Tinggal <span class="text-rose-500">*</span></label>
                        <textarea name="address" rows="2" placeholder="Contoh: Jl. Merdeka No. 12, RT 03/RW 05, Kecamatan Kebayoran Baru, Jakarta Selatan" required 
                                 class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border @error('address') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition duration-200 placeholder-slate-400/70 dark:placeholder-slate-500/50 resize-none">{{ old('address', $studentProfile->address ?? '') }}</textarea>
                        @error('address') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Sistem & Keanggotaan</h3>
                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5 font-medium">Parameter keamanan hak akses inti yang dikunci oleh sistem.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Alamat Email</label>
                        <input type="email" value="{{ auth()->user()->email }}" disabled class="w-full px-4 py-2.5 text-xs font-medium text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-800/30 border border-slate-100 dark:border-slate-800 rounded-xl cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Role Akses</label>
                        <input type="text" value="{{ auth()->user()->role ?? 'Siswa' }}" disabled class="w-full px-4 py-2.5 text-xs font-semibold text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-800/30 border border-slate-100 dark:border-slate-800 rounded-xl cursor-not-allowed uppercase tracking-wider">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 dark:text-slate-500 uppercase tracking-wider mb-1.5">Status Akun</label>
                        <input type="text" value="Aktif" disabled class="w-full px-4 py-2.5 text-xs font-medium text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-800/30 border border-slate-100 dark:border-slate-800 rounded-xl cursor-not-allowed">
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6 transition-all duration-300">
                <div>
                    <h3 class="text-xs font-semibold text-slate-900 dark:text-slate-100 uppercase tracking-wider">Perbarui Kata Sandi</h3>
                    <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-0.5 font-medium">Kosongkan kolom di bawah jika Anda tidak berniat mengubah kata sandi saat ini.</p>
                </div>

                <div class="grid grid-cols-1 gap-5 max-w-xl">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-1.5">Kata Sandi Saat Ini *</label>
                        <input type="password" name="current_password" class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 focus:ring-4 transition duration-200">
                        @error('current_password') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-1.5">Kata Sandi Baru *</label>
                        <input type="password" name="password" class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 focus:ring-4 transition duration-200">
                        @error('password') <p class="text-[10px] text-rose-500 font-semibold mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 dark:text-slate-400 uppercase tracking-wider mb-1.5">Konfirmasi Kata Sandi Baru *</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl bg-white dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 focus:border-blue-500 focus:ring-blue-500/10 focus:ring-4 transition duration-200">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4">
                <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200/60 dark:hover:bg-slate-700/80 text-slate-600 dark:text-slate-300 font-semibold text-xs rounded-xl transition duration-150">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl transition shadow-sm shadow-blue-500/10 hover:shadow-blue-500/20 transform active:scale-95 duration-200 cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection