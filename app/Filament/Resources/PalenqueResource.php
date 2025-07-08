<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PalenqueResource\Pages;
use App\Filament\Resources\PalenqueResource\RelationManagers;
use App\Models\City;
use App\Models\Palenque;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class PalenqueResource extends Resource
{
    protected static ?string $model = Palenque::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Mezcal tables';
    protected static ?int $navigationSort = 10;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información del palenque')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(25),
                        Forms\Components\TextInput::make('descripcion')
                            ->required(),
                        Forms\Components\TextInput::make('historia')
                            ->required(),
                        Forms\Components\FileUpload::make('foto')
                            ->maxSize(10240)
                            ->directory('uploads/palenques') // Más específico
                            ->disk('public')                // Disco público para acceso web
                            ->visibility('public')          // Visible públicamente
                            ->image(),
                        ]),
                        Section::make('Información de contacto (opcional)')
                        ->columns(3)
                        ->schema([
                            Forms\Components\TextInput::make('telefono')
                                ->maxLength(10),
                            Forms\Components\TextInput::make('correo')
                                ->maxLength(25),
                        ]),
                        Section::make('Información de dirección')
                        ->columns(3)
                        ->schema([
                            Forms\Components\Select::make('country_id')
                                ->relationship(name: 'country', titleAttribute: 'name')
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(function (Set $set){
                                    $set('state_id', null);
                                    $set('city_id', null);
                                })
                                ->required(),
                            Forms\Components\Select::make('state_id')
                            ->options(fn (Get $get): Collection => State::query()
                            ->where('country_id', $get('country_id'))
                            ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                            ->required(),
                            Forms\Components\Select::make('city_id')
                            ->options(fn (Get $get): Collection => City::query()
                            ->where('state_id', $get('state_id'))
                            ->pluck('name','id'))
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required(),
                            Forms\Components\TextInput::make('address')
                                ->maxLength(25),
                            Forms\Components\TextInput::make('postal_code')
                                ->maxLength(5),
                            Forms\Components\TextInput::make('latitude')
                                ->maxLength(10, 8),
                            Forms\Components\TextInput::make('longitude')
                                ->maxLength(11, 8),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('historia')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public')           // Especifica el disco
                    ->height(50)              // Altura de la imagen
                    ->width(50)    
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPalenques::route('/'),
            'create' => Pages\CreatePalenque::route('/create'),
            'edit' => Pages\EditPalenque::route('/{record}/edit'),
        ];
    }
}
