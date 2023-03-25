<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComponentResource\Pages;
use App\Models\Component;
use App\Models\Framework;
use App\Models\Language;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Facades\Lang;

class ComponentResource extends Resource
{
    protected static ?string $model = Component::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\Textarea::make('body'),
                Forms\Components\Select::make('language_id')
                    ->options(function () { return Language::pluck('name', 'id'); })->required(),
                Forms\Components\Select::make('framework_id')
                    ->options(function () { return Framework::pluck('name', 'id'); })->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('language.name'),
                Tables\Columns\TextColumn::make('framework.name'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComponents::route('/'),
            'create' => Pages\CreateComponent::route('/create'),
            'edit' => Pages\EditComponent::route('/{record}/edit'),
        ];
    }
}
