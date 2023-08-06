<?php

namespace App\Filament\Resources\CiasResource\Pages;

use App\Filament\Resources\CiasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCias extends ListRecords
{
    protected static string $resource = CiasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
