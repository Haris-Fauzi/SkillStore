<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentProjects extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Project::query()->latest()->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pemilik'),

                Tables\Columns\BadgeColumn::make('status'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Upload')
                    ->since(),
            ]);
    }
}