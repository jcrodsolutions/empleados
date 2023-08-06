<?php

namespace App\Filament\Resources\DepartamentosResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\{
    Select,
    TextInput,
};
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Paises;

class EmpleadosRelationManager extends RelationManager {

    protected static string $relationship = 'empleados';
    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            TextInput::make('nombre')->required()->maxLength(50),
                            TextInput::make('apellido')->required()->maxLength(50),
                            TextInput::make('cedula')->required()->maxLength(20),
                            Select::make('id_nacionalidad')->label('Nacionalidad')->options(Paises::damePaises())->required(),
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('persona')->sortable()->searchable(),
                            TextColumn::make('nombre')->sortable()->searchable(),
                            TextColumn::make('nacionalidades.codigo')->label('Nacionalidad')->sortable(),
                            TextColumn::make('cedula')->sortable()->searchable()->copyable()
                            ->copyMessage('Cedula Copiada')
                            ->copyMessageDuration(1500),
                            TextColumn::make('fecha_contrato')->label('Fecha de Contratación')->date('Y-m-d')->sortable(),
                        ])
                        ->filters([
                                //
                        ])
                        ->headerActions([
                            Tables\Actions\CreateAction::make(),
                        ])
                        ->actions([
                            Tables\Actions\EditAction::make(),
                            Tables\Actions\DeleteAction::make(),
                        ])
                        ->bulkActions([
                            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

}
