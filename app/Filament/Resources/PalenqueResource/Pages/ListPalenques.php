<?php

namespace App\Filament\Resources\PalenqueResource\Pages;

use App\Filament\Resources\PalenqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPalenques extends ListRecords
{
    protected static string $resource = PalenqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
