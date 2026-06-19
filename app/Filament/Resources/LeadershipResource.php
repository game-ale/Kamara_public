<?php

namespace App\Filament\Resources;

use App\Domain\Website\Models\LeadershipProfile;
use App\Filament\Resources\LeadershipResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LeadershipResource extends Resource
{
    protected static ?string $model = LeadershipProfile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'School';
    protected static ?string $navigationLabel = 'Leadership';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Profile')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('title')->required()->maxLength(255)->placeholder('e.g. Principal'),
                Forms\Components\Textarea::make('bio')->rows(5)->columnSpanFull(),
                Forms\Components\TextInput::make('email')->email()->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('leadership')
                    ->disk(env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public')
                    ->imageEditor(),
                Forms\Components\TextInput::make('display_order')
                    ->numeric()
                    ->default(0),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->disk(env('SUPABASE_ACCESS_KEY_ID') ? 'supabase' : 'public')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('display_order')->sortable(),
            ])
            ->defaultSort('display_order')
            ->reorderable('display_order')
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\DeleteBulkAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeadership::route('/'),
            'create' => Pages\CreateLeadership::route('/create'),
            'edit' => Pages\EditLeadership::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasPermissionTo("manage_leadership");
    }
}
