<?php

namespace App\Filament\Resources;

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
                    ->required(),

                Textarea::make('keyword')
                    ->required(),

                Textarea::make('metatext')
                    ->required(),

                Textarea::make('description')
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

}
