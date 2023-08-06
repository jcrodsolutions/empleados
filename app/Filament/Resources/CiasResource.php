<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CiasResource\Pages;
use App\Filament\Resources\CiasResource\RelationManagers;
use App\Models\Cias;
use Filament\Forms;
use Filament\Forms\Components\{
    Card,
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CiasResource extends Resource {

    protected static ?string $model = Cias::class;
    protected static ?string $navigationIcon = 'heroicon-o-office-building';
    protected static ?string $navigationGroup = 'Organización';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form {
        return $form->schema([
                    Card::make()->schema([
                        TextInput::make('codigo')->maxLength(10),
                        TextInput::make('cia')->maxLength(50),
                        Toggle::make('activo'),
                    ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
                            TextColumn::make('id'),
                            TextColumn::make('codigo')->sortable()->searchable(),
                            TextColumn::make('cia')->sortable()->searchable(),
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
                RelationManagers\DivisionesRelationManager::class,
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListCias::route('/'),
            'create' => Pages\CreateCias::route('/create'),
            'edit' => Pages\EditCias::route('/{record}/edit'),
        ];
    }

}
