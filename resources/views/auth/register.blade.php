@extends('layouts.frontend')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950/60 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    
    <div class="max-w-4xl w-full bg-white dark:bg-slate-950 transition-colors duration-300 border border-slate-100 dark:border-slate-800 rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
        
        <div class="hidden md:flex flex-col justify-between p-10 bg-gradient-to-br from-blue-600 to-blue-700 text-white relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute left-10 top-20 w-24 h-24 bg-sky-400/20 rounded-full blur-xl"></div>

            <div class="z-10">
                <a href="{{ route('home') }}" class="text-lg font-black tracking-tight flex items-center gap-2">
                    <span>✨</span> SkillStore
                </a>
            </div>

            <div class="z-10 my-auto space-y-3">
                <h2 class="text-xl font-black leading-tight tracking-tight">Merangkai Solusi, Mewujudkan Visi Generasi.</h2>
                <p class="text-[11px] text-blue-100 leading-relaxed">Publikasikan portfolio project terbaikmu, bangun reputasi digital, dan buka peluang karier lebih luas bersama lulusan SMK hebat lainnya.</p>
            </div>

            <div class="z-10 text-[10px] text-blue-200/80 font-medium">
                &copy; 2026 SkillStore. All rights reserved.
            </div>
        </div>

        <div class="p-8 sm:p-10 flex flex-col justify-center">
            <div class="mb-6">
                <h3 class="text-lg font-black text-slate-900 dark:text-slate-100 transition-colors duration-300 tracking-tight">Mulai Perjalananmu</h3>
                <p class="text-xs text-slate-400 mt-1">Buat akun barumu untuk mulai mempublikasikan karya hebatmu.</p>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="identity_number" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Nomor Identitas (NIS/NIP)</label>
                    <input type="text" name="identity_number" id="identity_number" value="{{ old('identity_number') }}" required autofocus autocomplete="off" placeholder="Masukkan nomor induk siswa/guru"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
                    @error('identity_number')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama lengkap sesuai ijazah"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
                    @error('name')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Alamat Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username" placeholder="name@example.com"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
                    @error('email')
                        <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="password" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Password</label>
                        <input type="password" name="password" id="password" required autocomplete="new-password" placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
                        @error('password')
                            <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-[10px] font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1.5">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" placeholder="••••••••"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-colors duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-xs font-medium text-slate-800 dark:text-slate-200 placeholder-slate-300 dark:placeholder-slate-600">
                        @error('password_confirmation')
                            <p class="text-[10px] text-red-500 mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-2 space-y-3">
                    
                    <button type="submit" class="flex items-center justify-center w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition duration-150 shadow-lg shadow-blue-600/20 hover:shadow-xl hover:shadow-blue-600/30 transform hover:-translate-y-0.5 cursor-pointer">
                        Daftar Akun Baru
                    </button>
                    
                    <div class="text-center">
                        <a class="text-[11px] font-medium text-slate-400 hover:text-blue-600 transition" href="{{ route('login') }}">
                            Sudah punya akun? <span class="font-bold text-blue-500 underline">Masuk di sini</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    const form = document.getElementById('registerForm');

    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault(); 
            const formData = new FormData(form);
            
            try {
                const response = await axios.post(form.action, formData);
                
                if (response.status === 200 || response.status === 201) {
                    Swal.fire({
                        title: 'Registrasi Berhasil!',
                        text: 'Akun Anda telah terdaftar. Silakan menunggu konfirmasi dari admin.',
                        icon: 'success',
                        background: document.documentElement.classList.contains('dark') ? '#020617' : '#ffffff', 
                        color: document.documentElement.classList.contains('dark') ? '#f8fafc' : '#0f172a',
                        showConfirmButton: true,
                        confirmButtonText: 'Login Sekarang',
                        buttonsStyling: false, 
                        customClass: {
                            popup: 'rounded-3xl border border-slate-100 dark:border-slate-800/80 p-6 shadow-2xl transition-colors duration-300',
                            title: 'text-xl font-black tracking-tight text-slate-900 dark:text-slate-100 pt-2',
                            htmlContainer: 'text-xs text-slate-500 dark:text-slate-400 leading-relaxed px-2 pb-2',
                            confirmButton: 'w-full py-2.5 px-6 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-lg shadow-blue-600/20 cursor-pointer focus:outline-none focus:ring-4 focus:ring-blue-500/20'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}"; 
                        }
                    });
                }
            } catch (error) {
                console.error(error);
                
                Swal.fire({
                    title: 'Gagal Mendaftar',
                    text: error.response?.data?.message || 'Terjadi kesalahan teknis, silakan coba lagi.',
                    icon: 'error',
                    background: document.documentElement.classList.contains('dark') ? '#020617' : '#ffffff',
                    color: document.documentElement.classList.contains('dark') ? '#f8fafc' : '#0f172a',
                    buttonsStyling: false,
                    customClass: {
                        popup: 'rounded-3xl border border-slate-100 dark:border-slate-800/80 p-6 shadow-2xl',
                        title: 'text-xl font-black tracking-tight text-slate-900 dark:text-slate-100 pt-2',
                        htmlContainer: 'text-xs text-slate-500 dark:text-slate-400 leading-relaxed px-2 pb-2',
                        confirmButton: 'w-full py-2.5 px-6 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs transition shadow-md shadow-red-500/10 cursor-pointer'
                    }
                });
            }
        });
    }
</script>
@endsection