<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

            ImageColumn::make('thumbnail')
                ->label('Thumbnail')
                ->rounded()
                ->square(),

            TextColumn::make('title')
                ->searchable()
                ->sortable(),

            TextColumn::make('version')
                ->label('Versi')
                ->sortable(),

            TextColumn::make('category.category_name')
                ->label('Category')
                ->searchable()
                ->sortable(),

            TextColumn::make('file_project')
                ->label('File')
                ->limit(30),

            TextColumn::make('year')
                ->label('Tahun')
                ->sortable(),

            TextColumn::make('status')
                ->badge()
                ->sortable()
                ->color(fn (string $state): string => match ($state) {
                    'draft' => 'warning',
                    'published' => 'success',
                    'archived' => 'danger',
                    default => 'warning',
                }),

            TextColumn::make('created_at')
                ->label('Dibuat')
                ->dateTime('d M Y')
                ->sortable(),

            TextColumn::make('download_count')
            ->label('Download')
            ->sortable(),

            IconColumn::make('is_featured')
                ->label('Featured')
                ->boolean()
                ->sortable(),

        ])
            ->filters([
                //
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
