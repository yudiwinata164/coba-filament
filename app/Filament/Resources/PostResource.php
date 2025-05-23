<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
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
use Illuminate\Support\Str;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'Posts';

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

                Select::make('category_id')
                    ->label('Category')
                    ->options(function () {
                        return \App\Models\Postcategory::where('status', 'published')
                            ->pluck('category', 'id');
                    })
                    ->searchable()
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
                    ->directory('posts')
                    ->preserveFilenames()
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
                ImageColumn::make('featured_image')
                    ->label('Featured')
                    ->disk('public')
                    ->width(40)
                    ->height(40)
                    ->circular(),

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

                TextColumn::make('category.category')
                    ->label('Category')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->category?->status === 'published' ? $state : '-';
                    })
                    ->searchable()
                    ->sortable(),


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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
