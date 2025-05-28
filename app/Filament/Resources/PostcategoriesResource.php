<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostcategoriesResource\Pages;
use App\Filament\Resources\PostcategoriesResource\RelationManagers;
use App\Models\Postcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class PostcategoriesResource extends Resource
{
    protected static ?string $model = Postcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Posts';

    protected static ?string $label = 'Categories';

    protected static ?string $slug = 'post-categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                TextInput::make('category')
                    ->required()
                    ->reactive()
                    ->debounce(2000)
                    ->afterStateUpdated(function (callable $set, $state) {
                        $slug = \Str::slug($state);
                        $set('url', $slug);
                    }),

                TextInput::make('url')
                    ->label('URL Slug')
                    ->prefix(config('app.url') . '/')
                    ->required(),
                    
                Textarea::make('description')
                    ->required()
                    ->helperText('maximum of 160 characters'),
                    
                Textarea::make('keyword')
                    ->required()
                    ->helperText('Enter a comma as a keyword separator'),
                    
                Select::make('status')
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->required(),

                Select::make('language')
                    ->label('Language')
                    ->options([
                        'en' => 'EN',
                        'id' => 'ID',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->searchable(),

                TextColumn::make('url')
                    ->label('URL')
                    ->formatStateUsing(function ($state) {
                        return config('app.url') . '/' . $state;
                    })
                    ->url(function ($record) {
                        return config('app.url') . '/' . $record->url;
                    }, true)
                    ->openUrlInNewTab(),

                TextColumn::make('language')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucwords($state)),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPostcategories::route('/'),
            'create' => Pages\CreatePostcategories::route('/create'),
            'edit' => Pages\EditPostcategories::route('/{record}/edit'),
        ];
    }
}
