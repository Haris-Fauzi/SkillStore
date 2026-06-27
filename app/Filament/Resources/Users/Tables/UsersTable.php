<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use App\Models\StudentProfile;
use App\Models\TeacherProfile;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('identity_number')
                ->label('ID Number')
                ->searchable()
                ->copyable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                // TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                TextColumn::make('role')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'admin' => 'danger',
                    'guru' => 'warning',
                    'siswa' => 'primary',
                    default => 'gray',
                })
                ->sortable(),
                TextColumn::make('status')
                ->badge()
                ->formatStateUsing(fn (string $state) => ucfirst($state))
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'active' => 'success',
                    'rejected' => 'danger',
                    default => 'gray',
                })
                ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
                SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'active' => 'Active',
                    'rejected' => 'Rejected',
                ])
                ->options([
                    'admin' => 'Admin',
                    'guru' => 'Guru',
                    'siswa' => 'Siswa',
                ]),
            ])
            ->recordActions([
                    Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'active')
                    ->action(function ($record) {

                        $record->update([
                            'status' => 'active',
                        ]);

                        if ($record->role === 'siswa') {

                            StudentProfile::firstOrCreate(
                                ['user_id' => $record->id],
                                [
                                    'is_profile_complete' => false,
                                ]
                            );

                        } elseif ($record->role === 'guru') {

                            TeacherProfile::firstOrCreate(
                                ['user_id' => $record->id],
                                [
                                    'is_profile_complete' => false,
                                ]
                            );

                        }

                        Notification::make()
                            ->title('User berhasil di-approve.')
                            ->success()
                            ->send();

                    }),
                    Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn ($record) => $record->status !== 'rejected')
                    ->action(function ($record) {

                        $record->update([
                            'status' => 'rejected',
                        ]);

                        Notification::make()
                            ->title('User berhasil ditolak.')
                            ->danger()
                            ->send();
                    }),

                    EditAction::make(),

                ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
