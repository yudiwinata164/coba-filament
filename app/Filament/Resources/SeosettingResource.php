<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\SeosettingResource\Pages;
use App\Filament\Resources\SeosettingResource\RelationManagers;
use App\Models\Seosetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class SeosettingResource extends Resource
{
    protected static ?string $model = Seosetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';

    protected static ?string $navigationGroup = 'Administrator';

    protected static ?string $label = 'SEO Setting';

    protected static ?string $slug = 'seo-settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->columnSpanFull()
                    ->required()
                    ->helperText('maximum of 60 characters'),
                    
                Textarea::make('description')
                    ->required()
                    ->helperText('maximum of 160 characters'),

                Textarea::make('keyword')
                    ->label('Keywords')
                    ->required()
                    ->helperText('Enter a comma as a keyword separator'),

                FileUpload::make('og_image')
                    ->label('OG Image')
                    ->image()
                    ->directory('seo')
                    ->preserveFilenames(false)
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->helperText('maximum size 2MB')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\EditSeoSingleSetting::route('/'),
        ];
    }

    public static function canAccess(): bool
    {
        return in_array(auth()->user()->user_level, ['developer']);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(auth()->user()->user_level, ['developer']);
    }


}
