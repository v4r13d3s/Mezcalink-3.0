<?php

namespace App\Filament\Resources\MaestroMezcaleroResource\Pages;

use App\Filament\Resources\MaestroMezcaleroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaestroMezcaleros extends ListRecords
{
    protected static string $resource = MaestroMezcaleroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
