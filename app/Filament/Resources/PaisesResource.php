<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaisesResource\Pages;
use App\Filament\Resources\PaisesResource\RelationManagers;
use App\Models\Paises;
use Filament\Forms;
use Filament\Forms\Components\{
    Card,
    TextInput,
};
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaisesResource extends Resource {

    protected static ?string $model = Paises::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe';
    protected static ?string $navigationGroup = 'Data Maestra';

    public static function form(Form $form): Form {
        return $form->schema([
                    Card::make()->schema([
                        TextInput::make('codigo')->minLength(2)->maxLength(5),
                        TextInput::make('pais')->maxLength(50)
                    ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                                TextColumn::make('id'),
                                TextColumn::make('codigo')->sortable()->searchable(),
                                TextColumn::make('pais')->sortable()->searchable(),
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
            'index' => Pages\ListPaises::route('/'),
            'create' => Pages\CreatePaises::route('/create'),
            'edit' => Pages\EditPaises::route('/{record}/edit'),
        ];
    }

}
