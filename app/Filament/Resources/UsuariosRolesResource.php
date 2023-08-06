<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuariosRolesResource\Pages;
use App\Filament\Resources\UsuariosRolesResource\RelationManagers;
use App\Models\UsuariosRoles;
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
use App\Models\{
    Roles,
    Usuarios,
};

class UsuariosRolesResource extends Resource {

    protected static ?string $model = UsuariosRoles::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Seguridad';

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            Card::make()->schema([
                                Select::make('id_usuario')
                                ->label('Usuario')
                                ->options(Usuarios::all()->pluck('usuario', 'id')),
                                Select::make('id_rol')
                                ->label('Rol')
                                ->options(Roles::all()->pluck('rol', 'id')),
                            ]),
                           
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                                //
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
            'index' => Pages\ListUsuariosRoles::route('/'),
            'create' => Pages\CreateUsuariosRoles::route('/create'),
            'edit' => Pages\EditUsuariosRoles::route('/{record}/edit'),
        ];
    }

}
