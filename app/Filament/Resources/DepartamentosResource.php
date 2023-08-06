<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartamentosResource\Pages;
use App\Filament\Resources\DepartamentosResource\RelationManagers;
use App\Models\{
    Departamentos,
    Divisiones,
};
use Filament\Forms;
use Filament\Forms\Components\{
    Card,
    TextInput,
    Toggle,
    Select,
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
    SelectFilter,
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartamentosResource extends Resource {

    protected static ?string $model = Departamentos::class;
    protected static ?string $navigationIcon = 'heroicon-o-office-building';
    protected static ?string $navigationGroup = 'Organización';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            Card::make()->schema([
                                Select::make('id_division')
                                ->label('División')
                                ->options(Divisiones::all()->pluck('codigo', 'id')),
                                TextInput::make('codigo')->maxLength(10),
                                TextInput::make('departamento')->maxLength(50),
                                Toggle::make('activo')->default(true),
                            ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('id'),
                            TextColumn::make('divisiones.division'),
                            TextColumn::make('codigo')->sortable()->searchable(),
                            TextColumn::make('departamento')->sortable()->searchable(),
                            ToggleColumn::make('activo'),
                            TextColumn::make('created_at')->dateTime()
                        ])
                        ->filters([
                            SelectFilter::make('divisiones')->relationship('divisiones', 'division')
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
            RelationManagers\EmpleadosRelationManager::class,
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListDepartamentos::route('/'),
            'create' => Pages\CreateDepartamentos::route('/create'),
            'edit' => Pages\EditDepartamentos::route('/{record}/edit'),
        ];
    }

}
