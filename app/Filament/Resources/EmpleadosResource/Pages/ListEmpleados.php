<?php

namespace App\Filament\Resources\EmpleadosResource\Pages;

use App\Filament\Resources\EmpleadosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmpleados extends ListRecords {

    protected static string $resource = EmpleadosResource::class;

    protected function getActions(): array {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array {
        return [
            EmpleadosResource\Widgets\EmpleadosVistaRapida::class,
        ];
    }

}
