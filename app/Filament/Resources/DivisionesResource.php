<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DivisionesResource\Pages;
use App\Filament\Resources\DivisionesResource\RelationManagers;
use App\Models\{
    Divisiones,
    Cias,
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DivisionesResource extends Resource {

    protected static ?string $model = Divisiones::class;
    protected static ?string $navigationIcon = 'heroicon-o-office-building';
    protected static ?string $navigationGroup = 'Organización';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form {
        return $form->schema([
                    Card::make()->schema([
                                Select::make('id_cia')
                                ->label('Cia')
                                ->options(Cias::all()->pluck('codigo', 'id')),
                        TextInput::make('codigo')->maxLength(10),
                        TextInput::make('division')->maxLength(50),
                        Toggle::make('activo')->default(true),
                    ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
                            TextColumn::make('id'),
                            TextColumn::make('cias.cia'),
                            TextColumn::make('codigo')->sortable()->searchable(),
                            TextColumn::make('division')->sortable()->searchable(),
                            ToggleColumn::make('activo'),
                            TextColumn::make('created_at')->dateTime()
                        ])
                        ->filters([
                                //
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

    public static function getPages(): array {
        return [
            'index' => Pages\ListDivisiones::route('/'),
            'create' => Pages\CreateDivisiones::route('/create'),
            'edit' => Pages\EditDivisiones::route('/{record}/edit'),
        ];
    }

}
