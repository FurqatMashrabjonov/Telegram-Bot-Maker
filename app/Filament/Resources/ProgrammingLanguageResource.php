<?php

namespace App\Filament\Resources;

use App\Enums\LanguageStatus;
use App\Filament\Resources\LanguageResource\RelationManagers\LanguagesRelationManager;
use App\Filament\Resources\ProgrammingLanguageResource\Pages;
use App\Models\Language;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;

class ProgrammingLanguageResource extends Resource
{
    protected static ?string $model = Language::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('key'),
                Forms\Components\TextInput::make('extension'),
                Forms\Components\Checkbox::make('status')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('extension'),
                BadgeColumn::make('status')
                    ->color(static function ($state): string {
                        if ($state === LanguageStatus::ACTIVE) {
                            return 'success';
                        }

                        return 'danger';
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            LanguagesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgrammingLanguages::route('/'),
            'create' => Pages\CreateProgrammingLanguage::route('/create'),
            'edit' => Pages\EditProgrammingLanguage::route('/{record}/edit'),
        ];
    }
}
