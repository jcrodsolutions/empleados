<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuariosResource\Pages;
use App\Models\Usuarios;
use Filament\Forms;
use Filament\Forms\Components\{
    Card,
    DatePicker,
    Select,
    TextInput,
    Toggle,
};
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
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
use Hash;

class UsuariosResource extends Resource {

    protected static ?string $model = Usuarios::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationGroup = 'Seguridad';
    protected static ?string $navigationLabel = 'Usuarios';

    public static function form(Form $form): Form {
        return $form
                        ->schema([
                            Card::make()->schema([
                                TextInput::make('usuario')->label('Usuario')->maxLength(50)->required(),
                                TextInput::make('nombre')->label('Nombre')->maxLength(50)->required(),
                                TextInput::make('email')->label('Direccion de correo')->maxLength(150)->email()->required(),
                                TextInput::make('password')->label('Password')
                                ->password()
                                ->minLength(8)
                                ->maxLength(50)
                                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord) // Solo se requiere cuando es create
                                ->same('passwordConfirmation')
                                ->dehydrated(fn($state) => filled($state))
                                ->disableAutocomplete()
                                ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                                TextInput::make('passwordConfirmation')->label('Password Confirmation')
                                ->password()
                                ->minLength(8)
                                ->maxLength(50)
                                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord) // Solo se requiere cuando es create
//                                ->required(fn(Page $livewire): bool => $livewire instanceof CreateRecord)
                                ->same('password')
                                ->dehydrated(false)
                                ->disableAutoComplete(),
                            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table
                        ->columns([
                            TextColumn::make('id'),
                            TextColumn::make('name')->sortable()->searchable(),
                            TextColumn::make('email')->sortable()->searchable(),
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
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuarios::route('/create'),
            'edit' => Pages\EditUsuarios::route('/{record}/edit'),
        ];
    }

}
