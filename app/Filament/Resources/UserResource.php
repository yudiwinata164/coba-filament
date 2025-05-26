<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Administrator';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('email')
                ->required()
                ->email()
                ->unique(ignoreRecord: true),

            TextInput::make('password')
                ->required(fn($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                ->password()
                ->revealable()
                    ->nullable()
                ->dehydrated(fn($state) => filled($state)),

            Select::make('user_level')
                ->label('Level Akses')
                ->options(function () {
                    return auth()->user()->user_level === 'administrator'
                        ? [
                            'manajemen' => 'Manajemen',
                            'administrator' => 'Administrator',
                        ]
                        : [
                            'manajemen' => 'Manajemen',
                            'administrator' => 'Administrator',
                            'developer' => 'Developer',
                        ];
                })
                ->required()
                ->visible(fn () => in_array(auth()->user()->user_level, ['developer', 'administrator'])),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('user_level')
                ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn($record) =>
                        auth()->user()->user_level === 'developer' ||
                        (auth()->user()->user_level === 'administrator' && $record->user_level !== 'developer')
                    ),

                Tables\Actions\DeleteAction::make()
                    ->visible(fn($record) =>
                        auth()->user()->user_level === 'developer' ||
                        (auth()->user()->user_level === 'administrator' && $record->user_level !== 'developer')
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn() =>
                            auth()->user()->user_level === 'developer'
                        ),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return in_array(auth()->user()->user_level, ['developer', 'administrator']);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return static::canAccess();
    }

    public static function canCreate(): bool
    {
        return in_array(auth()->user()->user_level, ['developer', 'administrator']);
    }

    public static function canEdit(Model $record): bool
    {
        $user = auth()->user();
        return $user->user_level === 'developer' ||
            ($user->user_level === 'administrator' && $record->user_level !== 'developer');
    }

    public static function canDelete(Model $record): bool
    {
        $user = auth()->user();
        return $user->user_level === 'developer' ||
            ($user->user_level === 'administrator' && $record->user_level !== 'developer');
    }
}
