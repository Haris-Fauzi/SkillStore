<section>
    <header class="mb-6">
        <h2 class="text-sm font-black text-slate-800 uppercase tracking-wider">
            {{ __('Perbarui Kata Sandi') }}
        </h2>
        <p class="mt-1 text-xs text-slate-400">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak demi menjaga keamanan data.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                Kata Sandi Saat Ini <span class="text-rose-500">*</span>
            </label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                   class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 rounded-xl border @if($errors->updatePassword->get('current_password')) border-rose-400 focus:ring-rose-500/10 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/10 @endif focus:ring-4 transition">
            @if($errors->updatePassword->get('current_password'))
                <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                Kata Sandi Baru <span class="text-rose-500">*</span>
            </label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                   class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 rounded-xl border @if($errors->updatePassword->get('password')) border-rose-400 focus:ring-rose-500/10 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/10 @endif focus:ring-4 transition">
            @if($errors->updatePassword->get('password'))
                <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $errors->updatePassword->first('password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                Konfirmasi Kata Sandi Baru <span class="text-rose-500">*</span>
            </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                   class="w-full px-4 py-2.5 text-xs font-medium text-slate-800 rounded-xl border @if($errors->updatePassword->get('password_confirmation')) border-rose-400 focus:ring-rose-500/10 @else border-slate-200 focus:border-blue-500 focus:ring-blue-500/10 @endif focus:ring-4 transition">
            @if($errors->updatePassword->get('password_confirmation'))
                <p class="text-[10px] text-rose-500 font-bold mt-1">⚠️ {{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" 
                    class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl transition shadow-sm shadow-blue-500/10">
                🔒 {{ __('Perbarui Kata Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)"
                     class="text-[11px] font-bold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-xl border border-emerald-100">
                    ✓ {{ __('Kata sandi berhasil diperbarui.') }}
                </div>
            @endif
        </div>
    </form>
</section>