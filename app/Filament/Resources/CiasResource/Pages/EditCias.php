<?php

namespace App\Filament\Resources\CiasResource\Pages;

use App\Filament\Resources\CiasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCias extends EditRecord
{
    protected static string $resource = CiasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
