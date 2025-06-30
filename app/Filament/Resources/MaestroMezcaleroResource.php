<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaestroMezcaleroResource\Pages;
use App\Filament\Resources\MaestroMezcaleroResource\RelationManagers;
use App\Models\MaestroMezcalero;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MaestroMezcaleroResource extends Resource
{
    protected static ?string $model = MaestroMezcalero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Mezcal tables';
    protected static ?int $navigationSort = 8;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaestroMezcaleros::route('/'),
            'create' => Pages\CreateMaestroMezcalero::route('/create'),
            'edit' => Pages\EditMaestroMezcalero::route('/{record}/edit'),
        ];
    }
}
