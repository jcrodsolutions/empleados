<?php

namespace App\Filament\Resources\UsuariosRolesResource\Pages;

use App\Filament\Resources\UsuariosRolesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsuariosRoles extends EditRecord
{
    protected static string $resource = UsuariosRolesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
