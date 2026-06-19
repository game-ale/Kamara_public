<?php

namespace App\Filament\Resources;

use App\Domain\Website\Models\Testimonial;
use App\Filament\Resources\TestimonialResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'School';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('quote')->required()->rows(4)->columnSpanFull(),
            Forms\Components\TextInput::make('author_name')->required()->maxLength(255),
            Forms\Components\TextInput::make('author_role')->maxLength(255)->placeholder('e.g. Parent of Grade 5 student'),
            Forms\Components\Toggle::make('is_featured')->default(false),
            Forms\Components\TextInput::make('display_order')->numeric()->default(0),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('author_role'),
                Tables\Columns\TextColumn::make('quote')->limit(60),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasPermissionTo("manage_testimonials");
    }
}
