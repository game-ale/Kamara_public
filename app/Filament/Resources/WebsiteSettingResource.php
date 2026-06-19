<?php

namespace App\Filament\Resources;

use App\Domain\Website\Models\WebsiteSetting;
use App\Filament\Resources\WebsiteSettingResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WebsiteSettingResource extends Resource
{
    protected static ?string $model = WebsiteSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('group')
                ->options([
                    'homepage' => 'Homepage',
                    'contact' => 'Contact Info',
                    'social' => 'Social Links',
                    'general' => 'General',
                ])
                ->required()
                ->disabledOn('edit'),
            Forms\Components\TextInput::make('key')
                ->required()
                ->maxLength(255)
                ->disabledOn('edit'),
            Forms\Components\Select::make('type')
                ->options([
                    'text' => 'Text',
                    'textarea' => 'Long Text',
                    'json' => 'JSON Data',
                    'boolean' => 'True/False',
                ])
                ->required()
                ->live()
                ->disabledOn('edit'),

            // Dynamic value field based on type
            Forms\Components\TextInput::make('value')
                ->required()
                ->visible(fn (Forms\Get $get) => $get('type') === 'text' || $get('type') === null),
                
            Forms\Components\Textarea::make('value')
                ->required()
                ->rows(4)
                ->visible(fn (Forms\Get $get) => $get('type') === 'textarea'),
                
            Forms\Components\Textarea::make('value')
                ->required()
                ->rows(10)
                ->visible(fn (Forms\Get $get) => $get('type') === 'json'),
                
            Forms\Components\Toggle::make('value')
                ->visible(fn (Forms\Get $get) => $get('type') === 'boolean'),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group')->badge()->sortable(),
                Tables\Columns\TextColumn::make('key')->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('value')->limit(50),
            ])
            ->defaultGroup('group')
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'homepage' => 'Homepage',
                        'contact' => 'Contact Info',
                        'social' => 'Social Links',
                        'general' => 'General',
                    ]),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebsiteSettings::route('/'),
            'create' => Pages\CreateWebsiteSetting::route('/create'),
            'edit' => Pages\EditWebsiteSetting::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasPermissionTo("manage_settings");
    }
}
