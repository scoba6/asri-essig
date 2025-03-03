<?php

namespace App\Filament\Resources\MinistereResource\Pages;

use App\Filament\Resources\MinistereResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMinisteres extends ManageRecords
{
    protected static string $resource = MinistereResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
