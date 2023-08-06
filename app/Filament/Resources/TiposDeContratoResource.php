<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiposDeContratoResource\Pages;
use App\Filament\Resources\TiposDeContratoResource\RelationManagers;
use App\Models\TiposDeContrato;
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

class TiposDeContratoResource extends Resource {

    protected static ?string $model = TiposDeContrato::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Data Maestra';

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            Card::make()->schema([
                                TextInput::make('tipo')->maxLength(8),
                            ])
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('id'),
                            TextColumn::make('tipo')->sortable()->searchable(),
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
            'index' => Pages\ListTiposDeContratos::route('/'),
            'create' => Pages\CreateTiposDeContrato::route('/create'),
            'edit' => Pages\EditTiposDeContrato::route('/{record}/edit'),
        ];
    }

}
