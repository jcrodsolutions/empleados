<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpleadosResource\Pages;
use App\Filament\Resources\EmpleadosResource\RelationManagers;
use App\Models\{
    Cias,
    Departamentos,
    Divisiones,
    Empleados,
    Paises,
    TiposDeContrato,
};
use Filament\Forms;
use Filament\Forms\Components\{
    Card,
    DatePicker,
    Select,
    TextInput,
    Toggle,
};
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\{
    TextColumn,
    ToggleColumn,
};
use Filament\Tables\Filters\{
//    Filter,
    SelectFilter,
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmpleadosResource extends Resource {

    protected static ?string $model = Empleados::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

//    protected static ?string $navigationGroup = 'Sistema';

    public static function form(Form $form): Form {
        $opcionesTDC = TiposDeContrato::all()->pluck('tipo', 'id');

        return $form
                        ->schema([
                            Card::make()->schema([
                                TextInput::make('persona')->maxLength(10)->label('Número de Empleado')->required(),
                                TextInput::make('nombre')->maxLength(50)->required(),
                                TextInput::make('apellido')->maxLength(50)->required(),
                                Select::make('id_nacionalidad')->label('Nacionalidad')->options(Paises::damePaises())->required(),
                                TextInput::make('cedula')->maxLength(20)->required(),
                                DatePicker::make('fecha_nacimiento')->maxDate(now())->required(),
                                Select::make('id_cia')
                                ->label('Cias')
                                ->options(Cias::dameCias())
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('id_division', null))
                                ->required()
                                ,
                                Select::make('id_division')
                                ->label('Divisiones')
                                ->options(function (callable $get) {
                                    $cia = Cias::find($get('id_cia'));

                                    if (!$cia) {
//                                        return Divisiones::where('activo', 1)->get()->pluck('division', 'id');// tambien puedo devolver un array en blanco
                                        return [];
                                    }

                                    return $cia->divisiones->pluck('division', 'id');
                                })
                                ->reactive()
                                ->afterStateUpdated(fn(callable $set) => $set('id_departamento', null))
                                ->required()
                                ,
                                Select::make('id_departamento')->label('Departamento')->options(function (callable $get) {
                                    $division = Divisiones::find($get('id_division'));

                                    if (!$division) {
                                        return [];
                                    }
                                    return $division->departamentos->pluck('departamento', 'id');
                                })->required(),
                                Select::make('id_tipo_de_contrato')->label('TiposDeContrato')->options($opcionesTDC)->required(),
                                DatePicker::make('fecha_contrato')->required(),
                                DatePicker::make('fecha_terminacion')->minDate(now()),
                                TextInput::make('email')->maxLength(150)->email(),
                                Toggle::make('activo')->default(true),
                            ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('id'),
                            TextColumn::make('persona')->sortable()->searchable(),
                            TextColumn::make('nombre')->sortable()->searchable(),
                            TextColumn::make('nacionalidades.codigo')->label('Nacionalidad')->sortable(),
                            // esto funciona
//                                ->description(fn (Empleados $record): string=> $record->nacionalidades->pais, position:'above'),
                            TextColumn::make('cedula')->sortable()->searchable()->copyable()
                            ->copyMessage('Cedula Copiada')
                            ->copyMessageDuration(1500),
                            TextColumn::make('fecha_contrato')->label('Fecha de Contratación')->date('Y-m-d')->sortable(),
                        ])
                        ->filters([
//                            Filter::make('fullName'),
                            SelectFilter::make('nacionalidades')->relationship('nacionalidades', 'pais'),
                            SelectFilter::make('departamentos')->relationship('departamentos', 'departamento')
                        ])
                        ->actions([
                            Tables\Actions\EditAction::make(),
                        ])
                        ->bulkActions([
                            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array {
        return [
                //
        ];
    }

    public static function getWidgets(): array {
        return[
            EmpleadosResource\Widgets\EmpleadosVistaRapida::class,
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListEmpleados::route('/'),
            'create' => Pages\CreateEmpleados::route('/create'),
            'edit' => Pages\EditEmpleados::route('/{record}/edit'),
        ];
    }

    protected function shouldPersistTableFiltersInSession(): bool {
        return true;
    }

}
