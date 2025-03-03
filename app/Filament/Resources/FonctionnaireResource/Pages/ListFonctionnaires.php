<?php

namespace App\Filament\Resources\FonctionnaireResource\Pages;

use App\Filament\Resources\FonctionnaireResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFonctionnaires extends ListRecords
{
    protected static string $resource = FonctionnaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
