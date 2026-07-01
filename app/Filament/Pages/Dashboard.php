<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    // Mengatur grid halaman secara eksplisit dan aman untuk Filament V5
    public function getColumns(): int|array
    {
        return [
            'sm' => 1,  // Layar HP: 1 kolom (semua widget menumpuk vertikal)
            'md' => 2,  // Layar Tablet: 2 kolom
            'lg' => 4,  // Layar Desktop: 4 kolom besar

        ];
    }
}