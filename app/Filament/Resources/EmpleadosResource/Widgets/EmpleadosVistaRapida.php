<?php

namespace App\Filament\Resources\EmpleadosResource\Widgets;

use App\Models\Empleados;
use App\Models\Paises;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmpleadosVistaRapida extends BaseWidget
{
    protected function getCards(): array
    {
        $pa = Paises::where('codigo','PA')->withCount('empleados')->first();
        $co = Paises::where('codigo','CO')->withCount('empleados')->first();
        return [
            Card::make('Empleados Total',Empleados::all()->count()),
            Card::make('Empleados: '.$pa->pais,$pa->empleados_count),
            Card::make('Empleados: '.$co->pais,$co->empleados_count),
        ];
    }
}
