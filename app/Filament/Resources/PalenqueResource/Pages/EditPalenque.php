<?php

namespace App\Filament\Resources\PalenqueResource\Pages;

use App\Filament\Resources\PalenqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPalenque extends EditRecord
{
    protected static string $resource = PalenqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
