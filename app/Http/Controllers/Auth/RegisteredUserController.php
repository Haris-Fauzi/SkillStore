<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Notifications\NewUserRegisteredNotification;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'identity_number' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'identity_number' => $request->identity_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'status' => 'pending',
        ]);

        event(new Registered($user));

        

$admins = User::where('role', 'admin')->get();

foreach ($admins as $admin) {
    // Ambil URL halaman Filament yang dituju (misal: UserResource halaman Index atau Edit)
    // Sesuaikan nama Resource Anda jika berbeda, misal: UserResource::getUrl('index')
    $targetUrl = \App\Filament\Resources\Users\UserResource::getUrl('index'); 

    $admin->notifications()->create([
        'id' => \Illuminate\Support\Str::uuid(),
        'type' => 'Filament\\Notifications\\DatabaseNotification',
        'data' => [
            'title' => 'User Baru Mendaftar',
            'body' => "{$user->name} telah mendaftar dan menunggu persetujuan.",
            'icon' => 'heroicon-o-user-plus',
            'color' => 'success',
            'duration' => null,
            'format' => 'filament',
            
            // Trik utama: Tambahkan array actions bawaan Filament agar muncul tombol klik
            'actions' => [
                [
                    'name' => 'view_user',
                    'label' => 'Lihat & Approve', // Tulisan di tombol notifikasi
                    'url' => $targetUrl,          // Link tujuan ketika diklik
                    'color' => 'success',
                    'icon' => 'heroicon-m-eye',
                    'shouldOpenInNewTab' => false,
                    'view' => 'filament-notifications::actions.button-action',
                ]
            ],
        ],
        'read_at' => null,
    ]);
}

        // Auth::login($user);

        return redirect()
        ->route('login')
        ->with('success', 'Registrasi berhasil. Akun Anda sedang menunggu persetujuan admin.');
    }
}
