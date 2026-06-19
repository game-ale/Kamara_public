<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmissionResource\Pages;
use App\Filament\Resources\AdmissionResource\RelationManagers;
use App\Domain\Website\Models\Admission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdmissionResource extends Resource
{
    protected static ?string $model = Admission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('school_id')
                    ->numeric(),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('student_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('student_dob')
                    ->required(),
                Forms\Components\TextInput::make('student_gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('grade_applying_for')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('previous_school')
                    ->maxLength(255),
                Forms\Components\Textarea::make('medical_notes')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('emergency_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emergency_relationship')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('submitted_at'),
                Forms\Components\TextInput::make('reviewed_by')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('reviewed_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_dob')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('student_gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade_applying_for')
                    ->searchable(),
                Tables\Columns\TextColumn::make('previous_school')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emergency_relationship')
                    ->searchable(),
                Tables\Columns\TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reviewed_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('reviewed_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAdmissions::route('/'),
            'create' => Pages\CreateAdmission::route('/create'),
            'view' => Pages\ViewAdmission::route('/{record}'),
            'edit' => Pages\EditAdmission::route('/{record}/edit'),
        ];
    }
}
