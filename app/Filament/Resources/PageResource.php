<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';
    
    protected static ?string $navigationGroup = 'Developer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
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

                Select::make('status')
                    ->required()
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->native(false),
                
                RichEditor::make('content')
                    ->required()
                    ->disableGrammarly()
                    ->columnSpanFull(),

                Textarea::make('keyword')
                        ->required()
                        ->helperText('maximum of 60 characters'),

                Textarea::make('description')
                        ->required()
                        ->helperText('maximum of 160 characters'),

                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('pages')
                    ->preserveFilenames(false)
                    ->disk('public')
                    ->visibility('public')
                    // ->maxSize(2048)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('url')
                    ->label('URL')
                    ->formatStateUsing(function ($state) {
                        return config('app.url') . '/' . $state;
                    })
                    ->url(function ($record) {
                        return config('app.url') . '/' . $record->url;
                    }, true)
                    ->openUrlInNewTab(),

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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
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
