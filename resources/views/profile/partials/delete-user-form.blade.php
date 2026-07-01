<section class="space-y-6">
    <header>
        <h2 class="text-sm font-black text-rose-800 uppercase tracking-wider">
            {{ __('Hapus Akun Permanen') }}
        </h2>
        <p class="mt-1 text-xs text-rose-600/80 leading-relaxed">
            {{ __('Setelah akun Anda dihapus, semua sumber daya, riwayat project, dan data di dalamnya akan dihapus secara permanen dari basis data SkillStore. Sebelum melanjutkan, pastikan Anda telah mengunduh data krusial yang sekiranya ingin disimpan.') }}
        </p>
    </header>

    <button type="button"
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="inline-flex items-center justify-center px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-xl transition shadow-sm shadow-rose-500/10">
        ⚠️ {{ __('Hapus Akun Saya') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white rounded-3xl">
            @csrf
            @method('delete')

            <h3 class="text-base font-black text-slate-900 tracking-tight">
                {{ __('Apakah Anda benar-benar yakin?') }}
            </h3>

            <p class="mt-2 text-xs text-slate-400 leading-relaxed">
                {{ __('Tindakan ini tidak dapat dibatalkan. Masukkan kata sandi akun Anda saat ini untuk mengonfirmasi bahwa Anda adalah pemilik sah yang meminta penghapusan data secara permanen.') }}
            </p>

            <div class="mt-4">
                <label for="password" class="sr-only">{{ __('Kata Sandi') }}</label>

                <input id="password"
                       name="password"
                       type="password"
                       placeholder="{{ __('Masukkan Kata Sandi Anda') }}"
                       class="w-full sm:w-3/4 px-4 py-2.5 text-xs font-medium text-slate-800 rounded-xl border @if($errors->userDeletion->get('password')) border-rose-400 focus:ring-rose-500/10 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/10 @endif focus:ring-4 transition placeholder-slate-300" />

                @if($errors->userDeletion->get('password'))
                    <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>

            <div class="mt-6 flex justify-end gap-3 pt-4 border-t border-slate-50">
                <button type="button" 
                        x-on:click="$dispatch('close')"
                        class="inline-flex items-center justify-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition">
                    {{ __('Batalkan') }}
                </button>

                <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs rounded-xl transition">
                    {{ __('Ya, Hapus Permanen') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>