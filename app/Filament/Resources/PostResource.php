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
use Filament\Forms\Get;
use Filament\Forms\Set;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    
    protected static ?string $navigationGroup = 'Posts';

    public static function form(Form $form): Form
    {
        return $form
                ->columns([
                    'sm' => 3,
                    'xl' => 6,
                    '2xl' => 8,
                ])
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->debounce(2000)
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
                    ->afterStateUpdated(function (callable $set, $state) {
                        $slug = \Str::slug($state);
                        $set('url', $slug);
                    }),

                TextInput::make('url')
                    ->label('URL Slug')
                    ->prefix(config('app.url') . '/')
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
                    ->required(),

                                
                Select::make('status')
                    ->required()
                    ->options([
                        'published' => 'Published',
                        'draft' => 'Draft',
                    ])
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 2,
                        '2xl' => 2,
                    ])
                    ->native(false),

                Select::make('language')
                    ->label('Language')
                    ->required()
                    ->options([
                        'en' => 'EN',
                        'id' => 'ID',
                    ])
                    ->reactive() // agar perubahan language bisa dipantau
                    ->afterStateUpdated(fn (Set $set) => $set('category_id', null)) // reset category saat language berubah
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 2,
                        '2xl' => 2,
                    ])
                    ->native(false),

                Select::make('category_id')
                    ->label('Category')
                    ->reactive()
                    ->options(function (Get $get) {
                        $language = $get('language');

                        if (!$language) {
                            return []; // jika belum memilih bahasa, kosongkan opsi
                        }

                        return \App\Models\Postcategory::where('status', 'published')
                            ->where('language', $language)
                            ->pluck('category', 'id');
                    })
                    ->searchable()
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
                    ->placeholder(fn (Get $get) => $get('language') ? 'Select Category' : 'Select language first')
                    ->disabled(fn (Get $get) => !$get('language')),

                RichEditor::make('content')
                    ->required()
                    ->disableGrammarly()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
                    ->helperText('maximum of 160 characters'),

                Textarea::make('keyword')
                    ->required()
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
                    ->helperText('Enter a comma as a keyword separator'),

                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('posts')
                    ->preserveFilenames(false)
                    ->disk('public')
                    ->visibility('public')
                    // ->maxSize(2048)
                    ->columnSpan([
                        'sm' => 2,
                        'xl' => 4,
                        '2xl' => 4,
                    ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
