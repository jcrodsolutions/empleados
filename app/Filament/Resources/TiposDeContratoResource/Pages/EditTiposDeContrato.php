<?php

namespace App\Filament\Resources\TiposDeContratoResource\Pages;

use App\Filament\Resources\TiposDeContratoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTiposDeContrato extends EditRecord
{
    protected static string $resource = TiposDeContratoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
