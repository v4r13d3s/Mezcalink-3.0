<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarcaResource\Pages;
use App\Filament\Resources\MarcaResource\RelationManagers;
use App\Models\Agave;
use App\Models\City;
use App\Models\Maestro;
use App\Models\Marca;
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
                    ->label('Nombre')
                    ->required()
                    ->maxLength(20),
                    Forms\Components\FileUpload::make('logo')
                    ->maxSize(10240)
                    ->label('Logo')
                    ->required()
                    ->image()
                    ->directory('uploads/marcas')
                    ->disk('public')
                    ->visibility('public'),
                    Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required(),
                    Forms\Components\TextInput::make('historia')
                    ->label('Historia'),
                    Forms\Components\TextInput::make('eslogan')
                    ->label('Eslogan')
                    ->required()
                    ->maxLength(50),
                    
                    // CORREGIDO: Usar el nombre plural de la relación
                    Forms\Components\Select::make('maestro')
                        ->label('Maestro')
                        ->multiple()
                        ->options(Maestro::all()->pluck('nombre', 'id'))
                        ->searchable(),
                    Forms\Components\Select::make('agave')
                        ->label('Agave')
                        ->multiple()
                        ->options(Agave::all()->pluck('nombre', 'id'))
                        ->searchable()
                        ->required(),
                    Forms\Components\Select::make('palenque')
                        ->label('Palenque')
                        ->multiple()
                        ->options(Palenque::all()->pluck('nombre', 'id'))
                        ->searchable(),
                    
                    
                ]),

                Section::make('Información legal')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('anio_fundacion')
                    ->label('Año de fundación')
                    ->numeric()
                    ->maxLength(4)
                    ->required(),
                    Forms\Components\FileUpload::make('certificado_dom')
                    ->maxSize(10240)
                    ->label('Certificado DOM')
                    ->image()
                    ->directory('uploads/marcas')
                    ->disk('public')
                    ->visibility('public'),
                ]),

                Section::make('Información de contacto')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('telefono')
                    ->label('Teléfono')
                    ->maxLength(13),
                    Forms\Components\TextInput::make('correo')
                    ->label('Correo')
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
                    ->addActionLabel('Agregar red social'),
                    Forms\Components\TextInput::make('sitio_web')
                    ->label('Sitio web')
                    ->required()
                    ->maxLength(255),
                ]),

                Section::make('Información de dirección')
                ->columns(3)
                ->schema([
                    
                    Forms\Components\Select::make('country_id')
                        ->label('País de origen')
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
                        ->label('Estado de origen')
                        ->options(fn (Get $get): Collection => State::query()
                        ->where('country_id', $get('country_id'))
                        ->pluck('name', 'id'))
                        ->searchable()
                        ->preload()
                        ->live()
                        ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                        ->required(),
                    Forms\Components\Select::make('city_id')
                        ->label('Ciudad de origen')
                        ->options(fn (Get $get): Collection => City::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name','id'))
                        ->searchable()
                        ->preload()
                        ->live(),
                    Forms\Components\TextInput::make('address')
                        ->label('Dirección')
                        ->maxLength(25),
                    Forms\Components\TextInput::make('postal_code')
                        ->label('Código postal')
                        ->maxLength(5),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->limit(20)
                ->label('Nombre')
                ->sortable()
                ->searchable(),
                Tables\Columns\ImageColumn::make('logo')
                ->label('Logo')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->limit(30)
                ->label('Descripción')
                ->searchable(),
                Tables\Columns\TextColumn::make('historia')
                ->limit(30)
                ->label('Historia')
                ->searchable(),
                Tables\Columns\TextColumn::make('eslogan')
                ->limit(20)
                ->label('Eslogan')
                ->searchable(),
                
                // CORREGIDO: Mostrar relaciones many-to-many correctamente
                Tables\Columns\TextColumn::make('maestro.nombre')
                ->badge()
                ->separator(',')
                ->searchable(),
                Tables\Columns\TextColumn::make('agave.nombre')
                ->badge()
                ->separator(',')
                ->searchable(),
                Tables\Columns\TextColumn::make('palenque.nombre')
                ->badge()
                ->separator(',')
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
                ->limit(20)
                ->searchable(),
                Tables\Columns\TextColumn::make('sitio_web')
                ->limit(20)
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
                ->limit(20)
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
