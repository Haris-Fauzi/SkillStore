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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        // ================= STRATEGI DIRECT INSERT DATABASE =================
        // 1. Ambil semua ID user yang rolenya 'admin'
        $adminIds = User::where('role', 'admin')->pluck('id');

        if ($adminIds->isNotEmpty()) {
            // Tentukan URL tujuan Filament. Jika class UserResource bermasalah, di-hardcode ke string aman.
            $targetUrl = class_exists(\App\Filament\Resources\Users\UserResource::class) 
                ? \App\Filament\Resources\Users\UserResource::getUrl('index') 
                : url('/admin/users');

            // 2. Looping untuk memasukkan data notifikasi ke setiap admin
            foreach ($adminIds as $adminId) {
                // Generate UUID baru untuk kolom 'id' utama di tabel notifications
                $notificationId = Str::uuid()->toString();

                // Struktur data payload yang WAJIB dipahami oleh Filament v3
                $filamentPayload = [
                    'id' => $notificationId,
                    'title' => 'User Baru Mendaftar',
                    'body' => "{$user->name} telah mendaftar dan menunggu persetujuan.",
                    'icon' => 'heroicon-o-user-plus',
                    'color' => 'success',
                    'duration' => null,
                    'format' => 'filament',
                    'actions' => [
                        [
                            'name' => 'view_user',
                            'label' => 'Lihat & Approve',
                            'url' => $targetUrl,
                            'color' => 'success',
                            'icon' => 'heroicon-m-eye',
                            'shouldOpenInNewTab' => false,
                            'view' => 'filament-notifications::actions.button-action',
                        ]
                    ],
                ];

                // Query builder murni (100% bebas dari error Undefined Class/Type)
                DB::table('notifications')->insert([
                    'id' => $notificationId,
                    'type' => 'Filament\\Notifications\\DatabaseNotification',
                    'notifiable_type' => 'App\\Models\\User', // Sesuai namespace model User Anda
                    'notifiable_id' => $adminId,
                    'data' => json_encode($filamentPayload),
                    'read_at' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        // ===================================================================

        // Auth::login($user); // Di-comment agar siswa tidak otomatis masuk sebelum di-approve

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil. Akun Anda sedang menunggu persetujuan admin.');
    }
}