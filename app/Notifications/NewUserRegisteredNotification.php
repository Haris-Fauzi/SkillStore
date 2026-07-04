<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification
{
    use Queueable;

    protected $user;

    // Ambil data user yang baru mendaftar
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // Tentukan channel notifikasi (kita pakai database)
    public function via($notifiable)
    {
        return ['database'];
    }

    // Data yang akan disimpan ke kolom `data` di tabel notifications
    public function toArray($notifiable)
    {
        return [
            'message' => 'Ada pengguna baru mendaftar: ' . $this->user->name,
            'user_id' => $this->user->id,
            'email' => $this->user->email,
            'type' => 'registration'
        ];
    }
}