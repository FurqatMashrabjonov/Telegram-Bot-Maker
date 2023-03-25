<?php

namespace App\Filament\Resources;

use App\Enums\LanguageStatus;
use App\Filament\Resources\FrameworkResource\Pages;
use App\Filament\Resources\FrameworkResource\RelationManagers;
use App\Models\Framework;
use App\Models\Language;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;

class FrameworkResource extends Resource
{
    protected static ?string $model = Framework::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('language_id')->options(function () {
                    return Language::pluck('name', 'id');
                })->required(),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('url')->default(''),
                Forms\Components\Checkbox::make('status')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('language.name'),
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
            RelationManagers\FrameworksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFrameworks::route('/'),
            'create' => Pages\CreateFramework::route('/create'),
            'edit' => Pages\EditFramework::route('/{record}/edit'),
        ];
    }
}
