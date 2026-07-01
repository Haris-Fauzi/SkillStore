<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ProjectUploadChart extends ChartWidget
{
    protected ?string $heading = 'Upload Project per Bulan';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 3;

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($month = 1; $month <= 12; $month++) {

            $labels[] = Carbon::create()->month($month)->translatedFormat('M');

            $data[] = Project::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Project',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}