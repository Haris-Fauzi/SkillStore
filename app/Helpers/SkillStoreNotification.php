<?php

namespace App\Helpers;

use Filament\Notifications\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SkillStoreNotification
{
    public static function newUser(User $user)
    {
        Notification::make()
            ->title('User baru mendaftar')
            ->body($user->name . ' telah bergabung')
            ->success()
            ->sendToDatabase(Auth::user());
    }

    public static function newProject($project)
    {
        Notification::make()
            ->title('Project baru di-upload')
            ->body($project->title)
            ->info()
            ->sendToDatabase(Auth::user());
    }

    public static function projectApproved($project)
    {
        Notification::make()
            ->title('Project disetujui')
            ->body($project->title)
            ->success()
            ->sendToDatabase(Auth::user());
    }

    public static function projectRejected($project)
    {
        Notification::make()
            ->title('Project ditolak')
            ->body($project->title)
            ->danger()
            ->sendToDatabase(Auth::user());
    }
}