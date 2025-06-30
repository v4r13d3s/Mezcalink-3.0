<?php

namespace App\Filament\Resources\MaestroMezcaleroResource\Pages;

use App\Filament\Resources\MaestroMezcaleroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaestroMezcalero extends EditRecord
{
    protected static string $resource = MaestroMezcaleroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
