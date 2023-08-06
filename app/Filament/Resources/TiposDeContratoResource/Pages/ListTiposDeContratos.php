<?php

namespace App\Filament\Resources\TiposDeContratoResource\Pages;

use App\Filament\Resources\TiposDeContratoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTiposDeContratos extends ListRecords
{
    protected static string $resource = TiposDeContratoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
