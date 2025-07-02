<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarcaResource\Pages;
use App\Filament\Resources\MarcaResource\RelationManagers;
use App\Models\City;
use App\Models\Marca;
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

class MarcaResource extends Resource
{
    protected static ?string $model = Marca::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Mezcal tables';
    protected static ?int $navigationSort = 6;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información básica')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(20),
                    Forms\Components\FileUpload::make('logo')
                    ->required()
                    ->image()
                    ->directory('uploads/marcas')
                    ->disk('public')
                    ->visibility('public'),
                    Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('historia')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('eslogan')
                    ->required()
                    ->maxLength(30),
                    Forms\Components\Select::make('country_id')
                        ->label('País de origen')
                        ->relationship(name: 'country', titleAttribute: 'name')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('agave_id')
                    ->relationship(name: 'agave', titleAttribute: 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                    Forms\Components\Select::make('palenque_id')
                    ->relationship(name: 'palenque', titleAttribute: 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                    Forms\Components\Select::make('maestro_id')
                    ->relationship(name: 'maestro', titleAttribute: 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                    
                ]),

                Section::make('Información legal')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('anio_fundacion')
                    ->required()
                    ->maxLength(4),
                    Forms\Components\FileUpload::make('certificado_dom')
                    ->required()
                    ->image()
                    ->directory('uploads/marcas')
                    ->disk('public')
                    ->visibility('public'),
                ]),

                Section::make('Información de contacto')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->maxLength(13),
                    Forms\Components\TextInput::make('correo')
                    ->required()
                    ->maxLength(30),
                    Forms\Components\Repeater::make('redes_sociales')
                    ->label('Redes Sociales')
                    ->schema([
                    Forms\Components\TextInput::make('enlace')
                            ->label('Enlace')
                            ->url()
                            ->maxLength(255),
                    ])
                    ->minItems(0)
                    ->maxItems(10) // Puedes ajustar el máximo si lo deseas
                    ->columnSpanFull(),
                    Forms\Components\TextInput::make('sitio_web')
                    ->required()
                    ->maxLength(255),
                ]),

                Section::make('Información de dirección')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('pais_origen')
                    ->required()
                    ->maxLength(20),
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
                        ->required()
                        ->maxLength(25),
                    Forms\Components\TextInput::make('postal_code')
                        ->required()
                        ->maxLength(5),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->sortable()
                ->searchable(),
                Tables\Columns\ImageColumn::make('logo')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->searchable(),
                Tables\Columns\TextColumn::make('historia')
                ->searchable(),
                Tables\Columns\TextColumn::make('eslogan')
                ->searchable(),
                Tables\Columns\TextColumn::make('country_id')
                    ->label('País de origen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agave_id')
                ->searchable(),
                Tables\Columns\TextColumn::make('palenque_id')
                ->searchable(),
                Tables\Columns\TextColumn::make('maestro_id')
                ->searchable(),
                Tables\Columns\TextColumn::make('anio_fundacion')
                ->searchable(),
                Tables\Columns\ImageColumn::make('certificado_dom')
                ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                ->searchable(),
                Tables\Columns\TextColumn::make('correo')
                ->searchable(),
                Tables\Columns\TextColumn::make('redes_sociales')
                ->searchable(),
                Tables\Columns\TextColumn::make('sitio_web')
                ->searchable(),
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
                ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                ->searchable(),
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
            'index' => Pages\ListMarcas::route('/'),
            'create' => Pages\CreateMarca::route('/create'),
            'edit' => Pages\EditMarca::route('/{record}/edit'),
        ];
    }
}
