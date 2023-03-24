<?php

namespace App\Filament\Resources\ProgrammingLanguageResource\Pages;

use App\Filament\Resources\ProgrammingLanguageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgrammingLanguage extends EditRecord
{
    protected static string $resource = ProgrammingLanguageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
