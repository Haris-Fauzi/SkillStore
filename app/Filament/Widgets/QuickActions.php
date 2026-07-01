<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QuickActions extends Widget
{
    protected string $view = 'filament.widgets.quick-actions';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
    'lg' => 2, // Mengisi 4 dari 4 kolom (Penuh sampai kanan!)
];
}
