<?php

namespace App\Filament\Resources;

use App\Domain\Website\Models\Gallery;
use App\Filament\Resources\GalleryResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Gallery Details')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\Textarea::make('description')->rows(3),
                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('galleries/covers')
                    ->disk(env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public'),
                Forms\Components\Toggle::make('is_published')->default(true),
            ])->columns(2),

            Forms\Components\Section::make('Gallery Images')->schema([
                Forms\Components\FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->reorderable()
                    ->directory('galleries/photos')
                    ->disk(env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public')
                    ->maxFiles(50)
                    ->columnSpanFull(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->disk(env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_published')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasPermissionTo("manage_galleries");
    }
}
