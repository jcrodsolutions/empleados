<?php

namespace App\Filament\Resources\DivisionesResource\Pages;

use App\Filament\Resources\DivisionesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDivisiones extends EditRecord
{
    protected static string $resource = DivisionesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
