<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewUserRegisteredNotification extends Notification
{
    use Queueable;

    public function __construct(
        public User $user,
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            // Key di bawah ini adalah format WAJIB standar Filament
            'title' => 'User Baru Mendaftar',
            'body' => "{$this->user->name} telah mendaftar dan menunggu persetujuan.",
            'icon' => 'heroicon-o-user-plus', // Opsional: Beri icon biar keren
            'color' => 'success',             // Opsional: Warna indikator (success, info, warning, danger)
            
            // Data tambahan kustom Anda tetap boleh dimasukkan di sini jika butuh
            'user_id' => $this->user->id,
            'type' => 'new_user',
        ];
    }
}