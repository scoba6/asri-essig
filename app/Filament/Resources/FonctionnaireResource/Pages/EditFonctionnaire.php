<?php

namespace App\Filament\Resources\FonctionnaireResource\Pages;

use App\Filament\Resources\FonctionnaireResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFonctionnaire extends EditRecord
{
    protected static string $resource = FonctionnaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
