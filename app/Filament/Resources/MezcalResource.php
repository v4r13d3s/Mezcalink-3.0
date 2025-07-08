<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MezcalResource\Pages;
use App\Filament\Resources\MezcalResource\RelationManagers;
use App\Models\Agave;
use App\Models\City;
use App\Models\Mezcal;
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

class MezcalResource extends Resource
{
    protected static ?string $model = Mezcal::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Mezcal tables';
    protected static ?int $navigationSort = 7;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información básica')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(20),
                    Forms\Components\Select::make('categoria')
                    ->label('Categoría')
                    ->options([
                        'tradicional' => 'Mezcal tradicional',
                        'artesana' => 'Mezcal artesanal',
                        'ancestral' => 'Mezcal ancestral',
                    ])
                    ->required(),
                    Forms\Components\Select::make('tipo')
                    ->label('Tipo de mezcal')
                    ->options([
                        'joven' => 'Mezcal joven',
                        'reposado' => 'Mezcal reposado',
                        'anejo' => 'Mezcal añejo',
                        'maduro' => 'Mezcal maduro en vidrio',
                        'abocado' => 'Mezcal abocado con',
                        'destilado' => 'Mezcal destilado con',
                    ])
                    ->required(),
                    Forms\Components\TextInput::make('precio_regular')
                    ->label('Precio regular')
                    ->numeric()
                    ->required(),
                    Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required(),
                    Forms\Components\TextInput::make('contenido_alcohol')
                    ->label('Contenido de alcohol')
                    ->numeric()
                    ->required(),
                    Forms\Components\TextInput::make('tamanio_bote')
                    ->label('Tamaño de bote')
                    ->required(),
                    Forms\Components\TextInput::make('proveedor')
                    ->label('Proveedor')
                    ->required(),
                    Forms\Components\Select::make('marca_id')
                    ->label('Marca')
                    ->relationship('marca', 'nombre')
                    ->required(),
                    Forms\Components\Select::make('agave')
                        ->label('Agave')
                        ->multiple()
                        ->options(Agave::all()->pluck('nombre', 'id'))
                        ->searchable(),
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
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('categoria')
                ->label('Categoría')
                ->searchable(),
                Tables\Columns\TextColumn::make('tipo')
                ->label('Tipo')
                ->searchable(),
                Tables\Columns\TextColumn::make('precio_regular')
                ->label('Precio regular')
                ->searchable(),
                Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->limit(30)
                ->searchable(),
                Tables\Columns\TextColumn::make('contenido_alcohol')
                ->label('Contenido de alcohol')
                ->searchable(),
                Tables\Columns\TextColumn::make('tamanio_bote')
                ->label('Tamaño de bote')
                ->searchable(),
                Tables\Columns\TextColumn::make('proveedor')
                ->label('Proveedor')
                ->searchable(),
                Tables\Columns\TextColumn::make('marca_id')
                ->label('Marca')
                ->searchable(),
                Tables\Columns\TextColumn::make('agave')
                ->label('Agave')
                ->searchable(),
                Tables\Columns\TextColumn::make('country_id')
                ->label('País de origen')
                ->searchable(),
                Tables\Columns\TextColumn::make('state_id')
                ->label('Estado de origen')
                ->searchable(),
                Tables\Columns\TextColumn::make('city_id')
                ->label('Ciudad de origen')
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
            'index' => Pages\ListMezcals::route('/'),
            'create' => Pages\CreateMezcal::route('/create'),
            'edit' => Pages\EditMezcal::route('/{record}/edit'),
        ];
    }
}
