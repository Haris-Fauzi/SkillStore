<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [

            Stat::make('Total User', number_format(User::count()))
                ->description('Semua pengguna')
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),

            Stat::make('Total Project', number_format(Project::count()))
                ->description('Semua project')
                ->descriptionIcon('heroicon-o-folder-open')
                ->color('success'),

            Stat::make('Published', Project::where('status', 'Published')->count())
                ->description('Project dipublikasikan')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Pending', Project::where('status', 'Pending')->count())
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning')
                ->chart([3,5,8,6,10,12,14]),

            Stat::make('Rejected', Project::where('status', 'Rejected')->count())
                ->description('Project ditolak')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger')
                ->chart([3,5,8,6,10,12,14]),

            Stat::make('Featured', Project::where('is_featured', true)->count())
                ->description('Project unggulan')
                ->descriptionIcon('heroicon-o-star')
                ->color('primary')
                ->chart([3,5,8,6,10,12,14]),

            Stat::make('Views', number_format(Project::sum('view_count')))
                ->description('Total kunjungan')
                ->descriptionIcon('heroicon-o-eye')
                ->color('gray')
                ->chart([3,5,8,6,10,12,14]),

            Stat::make('Downloads', number_format(Project::sum('download_count')))
                ->description('Total file diunduh')
                ->descriptionIcon('heroicon-o-arrow-down-tray')
                ->color('info')
                ->chart([3,5,8,6,10,12,14]),

            Stat::make('Categories', number_format(Category::count()))
                ->description('Kategori')
                ->descriptionIcon('heroicon-o-tag')
                ->color('primary')
                ->chart([3,5,8,6,10,12,14]),
        ];
        
    }

    protected function getColumns(): int
    {
        return 4;
    }

}