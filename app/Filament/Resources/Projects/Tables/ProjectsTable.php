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
use Filament\Actions\Action;
// use Fillament\Actions\ActionGroup;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

            ImageColumn::make('thumbnails')
                ->label('Thumbnail')
                ->getStateUsing(fn ($record) => asset('storage/' . $record->thumbnails))
                ->rounded()
                ->square(),

            TextColumn::make('screenshots_count')
                ->label('Screenshot')
                ->counts('screenshots')
                ->badge()
                ->sortable(),

            TextColumn::make('title')
                ->searchable()
                ->sortable(),

            TextColumn::make('version')
                ->label('Versi')
                ->badge()
                ->formatStateUsing(fn ($state) => 'v' . $state)
                ->color('gray')
                ->sortable(),

            TextColumn::make('category.category_name')
                ->label('Kategori')
                ->badge()
                ->color('primary')
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
                    'Pending' => 'warning',
                    'Published' => 'success',
                    'Rejected' => 'danger',
                    default => 'gray',
                }),
                // ->icon(fn (string $state): string => match ($state) {
                //     'published' => 'heroicon-o-check-circle',
                //     'pending'   => 'heroicon-o-clock',
                //     'rejected'  => 'heroicon-o-x-circle',
                //     default     => 'heroicon-o-question-mark-circle',
                // }),

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
                    'Pending' => 'Pending',
                    'Published' => 'Published',
                    'Rejected' => 'Rejected',
                ]),
            ])

            ->emptyStateHeading('Belum ada project')
            ->emptyStateDescription('Project yang ditambahkan akan muncul di sini.')
            ->emptyStateIcon('heroicon-o-folder-open')

            ->recordActions([
                ViewAction::make(),

                Action::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'Published')
                    ->action(fn ($record) => $record->update([
                        'status' => 'Published',
                    ])),

                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'Rejected')
                    ->action(fn ($record) => $record->update([
                        'status' => 'Rejected',
                    ])),
                
                EditAction::make(),
                DeleteAction::make()
            ])
            
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
