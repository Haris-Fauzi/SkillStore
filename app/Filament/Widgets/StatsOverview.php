<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
{
    return [
        Stat::make('Total Project', \App\Models\Project::count()),

        Stat::make(
            'Published',
            \App\Models\Project::where('status', 'published')->count()
        )
            ->description('Project yang dipublikasikan')
            ->color('success'),

        Stat::make(
            'Draft',
            \App\Models\Project::where('status', 'draft')->count()
        )
            ->description('Menunggu publikasi')
            ->color('warning'),

        Stat::make('Total Category', \App\Models\Category::count()),

        Stat::make('Total Download', \App\Models\Project::sum('download_count')),
    ];
}
}