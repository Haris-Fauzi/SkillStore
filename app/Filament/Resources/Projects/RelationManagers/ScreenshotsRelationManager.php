<?php

namespace App\Filament\Resources\Projects\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ScreenshotsRelationManager extends RelationManager
{
    protected static string $relationship = 'screenshots';
    protected static ?string $title = 'Screenshot Project';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Screenshot')
                    ->image()
                    ->directory('screenshots')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->required(),

                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('image')
                    ->label('Screenshot')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image)),
                TextEntry::make('sort_order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('image')
            ->columns([
                ImageColumn::make('image')
                    ->label('Preview')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image))
                    ->square()
                    ->size(120),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Upload')
                    ->dateTime('d M Y'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Screenshot'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
