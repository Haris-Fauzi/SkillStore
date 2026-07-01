<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Placeholder;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'category_name')
                    ->searchable()
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),

                TextInput::make('version')
                    ->label('Versi')
                    ->placeholder('1.0.0'),

                TextInput::make('github_url')
                    ->label('Github URL')
                    ->nullable(),

                TextInput::make('demo_url')
                    ->label('Demo URL')
                    ->nullable(),
                
                 TextInput::make('year')
                    ->label('Tahun Pembuatan')
                    ->numeric()
                    ->placeholder('2023')
                    ->maxLength(4)
                    ->nullable(),
                
                FileUpload::make('file_project')
                    ->label('File Project')
                    ->directory('projects')
                    ->downloadable()
                    ->openable(),
                    // ->acceptedFileTypes([
                    //     'application/vnd.android.package-archive', // APK
                    //     'application/zip',
                    //     'application/x-rar-compressed',
                    //     'application/pdf',
                    // ]),

                FileUpload::make('thumbnails')
                    ->label('Thumbnails')
                    ->image()
                    ->directory('thumbnails')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor(),

                Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Published' => 'Published',
                    ])
                    ->default('Pending')
                    ->required(),

                Toggle::make('is_featured')
                    ->label('Featured Project')
                    ->default(false),
            ]);
    }
}
