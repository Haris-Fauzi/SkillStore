<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\User;
use Filament\Widgets\Widget;

class NotificationCenter extends Widget
{
    protected string $view = 'filament.widgets.notification-center';

    protected int|string|array $columnSpan = [
    'lg' => 2, // Mengisi 4 dari 4 kolom (Penuh sampai kanan!)
];

    protected static ?int $sort = 5;

    protected function getViewData(): array
    {
        return [
            'pendingUsers' => User::where('status', 'Pending')->count(),

            'pendingProjects' => Project::where('status', 'Pending')->count(),

            'todayProjects' => Project::whereDate('created_at', today())->count(),
        ];
    }
}