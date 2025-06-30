<?php

namespace App\Filament\Resources\MezcalResource\Pages;

use App\Filament\Resources\MezcalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMezcal extends EditRecord
{
    protected static string $resource = MezcalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
