<?php

namespace App\Filament\Resources\AgaveResource\Pages;

use App\Filament\Resources\AgaveResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgaves extends ListRecords
{
    protected static string $resource = AgaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
