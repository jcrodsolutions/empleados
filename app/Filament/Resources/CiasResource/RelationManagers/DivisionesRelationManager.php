<?php

namespace App\Filament\Resources\CiasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\{
    Select,
    TextInput,
//    Toggle,
};
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\{
    TextColumn,
    ToggleColumn,
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Cias;

class DivisionesRelationManager extends RelationManager {

    protected static string $relationship = 'divisiones';
    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            Select::make('id_cia')
                            ->label('Cia')
                            ->options(Cias::dameCias()),
                            TextInput::make('codigo')->maxLength(10),
                            TextInput::make('division')->maxLength(50),
//                            Toggle::make('activo')->default(true),
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('cias.cia'),
                            TextColumn::make('codigo')->sortable()->searchable(),
                            TextColumn::make('division')->sortable()->searchable(),
                            ToggleColumn::make('activo'),
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
