@extends('layouts.frontend')

@section('content')
<div class="bg-white dark:bg-slate-900 border-b border-slate-100 py-3.5 px-4 sm:px-6 lg:px-8 sticky top-0 z-40 backdrop-blur-md bg-white/90 dark:bg-slate-900 transition-colors duration-300">
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
            <a href="{{ route('dashboard') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                📊 Dashboard Utama
            </a>
            <span class="text-slate-200">|</span>
            <a href="{{ url('/') }}" class="text-xs font-bold text-slate-500 dark:text-slate-400 transition-colors duration-300 hover:text-blue-600 transition flex items-center gap-1">
                🏠 Beranda
            </a>
        </div>
    </div>
</div>

<div class="py-8 bg-slate-50 dark:bg-slate-800/50 min-h-[90vh]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white dark:bg-slate-900 border border-slate-100 rounded-3xl shadow-sm dark:border-slate-800 overflow-hidden p-6 sm:p-8">
            <div class="mb-6 border-b border-slate-100 pb-4 flex items-start gap-4">
                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-lg flex-shrink-0">
                    👤
                </div>
                <div>
                    <h3 class="text-base font-black text-slate-800 dark:text-slate-200 tracking-tight">Kelola Profil Siswa</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Lengkapi data identitas akademi Anda untuk memvalidasi kepemilikan akun di SkillStore.</p>
                </div>
            </div>

            <form method="POST" action="{{ route('student-profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nomor Identitas Registrasi</label>
                        <input type="text" value="{{ auth()->user()->identity_number }}" disabled
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-400 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 transition-colors duration-300 rounded-xl cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Induk Siswa (NIS) <span class="text-rose-500">*</span></label>
                        <input type="text" name="nis" value="{{ old('nis', $studentProfile->nis ?? auth()->user()->identity_number) }}" required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('nis') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition">
                        @error('nis')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Nama Lengkap Akun</label>
                        <input type="text" value="{{ auth()->user()->name }}" disabled
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-400 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 transition-colors duration-300 rounded-xl cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jurusan <span class="text-rose-500">*</span></label>
                        <input type="text" name="major" value="{{ old('major', $studentProfile->major ?? '') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('major') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
                        @error('major')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Kelas <span class="text-rose-500">*</span></label>
                        <input type="text" name="class" value="{{ old('class', $studentProfile->class ?? '') }}" placeholder="Contoh: XII RPL 2" required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('class') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
                        @error('class')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nomor Telepon / WhatsApp <span class="text-rose-500">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $studentProfile->phone ?? '') }}" placeholder="Contoh: 081234567890" required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('phone') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
                        @error('phone')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tanggal Lahir <span class="text-rose-500">*</span></label>
                        <input type="date" name="birth_date" value="{{ old('birth_date', $studentProfile->birth_date ?? '') }}" required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('birth_date') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition">
                        @error('birth_date')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Alamat Tempat Tinggal <span class="text-rose-500">*</span></label>
                        <input type="text" name="address" value="{{ old('address', $studentProfile->address ?? '') }}" placeholder="Tuliskan nama jalan, rt/rw, dan kota..." required
                               class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 dark:text-slate-200 rounded-xl border @error('address') border-rose-400 focus:ring-rose-500/10 @else border-slate-200 dark:border-slate-700 transition-colors duration-300 focus:border-blue-500 focus:ring-blue-500/10 @enderror focus:ring-4 transition placeholder-slate-300">
                        @error('address')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 border border-slate-100 bg-slate-50 dark:bg-slate-800/50 p-4 rounded-2xl">
                        <label class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">Unggah Foto Profil</label>
                        
                        @if(isset($studentProfile) && $studentProfile->photo)
                            <div class="mb-3 flex items-center gap-3">
                                <img src="{{ asset('storage/' . $studentProfile->photo) }}" class="w-14 h-14 object-cover rounded-full border border-slate-200 dark:border-slate-700 transition-colors duration-300 shadow-sm dark:border-slate-800" alt="Avatar">
                                <p class="text-[10px] text-slate-400">💡 Biarkan kosong jika tidak ingin mengganti foto saat ini.</p>
                            </div>
                        @endif

                        <input type="file" name="photo" accept="image/*"
                               class="w-full text-xs text-slate-500 dark:text-slate-400 transition-colors duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition cursor-pointer">
                        @error('photo')
                            <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                        <a href="{{ route('dashboard') }}"
                           class="inline-flex items-center justify-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm dark:border-slate-800 shadow-blue-500/10">
                            💾 Simpan Profil
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>
@endsection