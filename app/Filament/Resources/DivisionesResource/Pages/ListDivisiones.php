<?php

namespace App\Filament\Resources\DivisionesResource\Pages;

use App\Filament\Resources\DivisionesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDivisiones extends ListRecords
{
    protected static string $resource = DivisionesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
