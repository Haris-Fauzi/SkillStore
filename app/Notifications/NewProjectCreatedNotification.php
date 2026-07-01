<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewProjectCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Project $project
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        // Menyiapkan URL target langsung ke halaman review project tersebut
        $targetUrl = \App\Filament\Resources\Projects\ProjectResource::getUrl('view', ['record' => $this->project]);

        return [
            'title' => 'Project Baru Diajukan',
            'body' => "Project berjudul \"{$this->project->title}\" telah dibuat oleh {$this->project->user->name}.",
            'icon' => 'heroicon-o-folder-plus',
            'color' => 'info',
            'duration' => null,
            'format' => 'filament',
            'actions' => [
                [
                    'name' => 'view_project',
                    'label' => 'Periksa Project',
                    'url' => $targetUrl,
                    'color' => 'info',
                    'icon' => 'heroicon-m-eye',
                    'shouldOpenInNewTab' => false,
                    'view' => 'filament-notifications::actions.button-action',
                ]
            ],
        ];
    }
}