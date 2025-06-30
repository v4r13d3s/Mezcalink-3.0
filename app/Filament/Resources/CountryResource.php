<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationGroup = 'System management';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('iso3')->maxLength(3),
                Forms\Components\TextInput::make('iso2')->maxLength(2),
                Forms\Components\TextInput::make('numeric_code')->maxLength(10),
                Forms\Components\TextInput::make('phonecode')->tel()->maxLength(10),
                Forms\Components\TextInput::make('capital'),
                Forms\Components\TextInput::make('currency'),
                Forms\Components\TextInput::make('currency_name'),
                Forms\Components\TextInput::make('currency_symbol'),
                Forms\Components\TextInput::make('region'),
                Forms\Components\TextInput::make('subregion'),
                Forms\Components\TextInput::make('latitude'),
                Forms\Components\TextInput::make('longitude'),
                Forms\Components\TextInput::make('emoji'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('iso3'),
                Tables\Columns\TextColumn::make('iso2'),
                Tables\Columns\TextColumn::make('numeric_code'),
                Tables\Columns\TextColumn::make('phonecode'),
                Tables\Columns\TextColumn::make('capital'),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\TextColumn::make('subregion'),
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
