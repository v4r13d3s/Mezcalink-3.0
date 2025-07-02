<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgaveResource\Pages;
use App\Filament\Resources\AgaveResource\RelationManagers;
use App\Models\Agave;
use App\Models\City;
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

class AgaveResource extends Resource
{
    protected static ?string $model = Agave::class;
    protected static ?string $navigationGroup = 'Mezcal tables';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?string $navigationType = '8';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Información del agave')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(25),
                        Forms\Components\TextInput::make('descripcion')
                            ->required()
                            ->maxLength(150),
                        Forms\Components\FileUpload::make('foto')
                            ->maxSize(10240)    
                            ->maxFiles(1)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/svg']) 
                            ->directory('uploads/agaves') // Más específico
                            ->disk('public')                // Disco público para acceso web
                            ->visibility('public')          // Visible públicamente
                            ->image(),
                        Forms\Components\TextInput::make('tiempo_maduracion')
                            ->required()
                            ->maxLength(2),
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
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiempo_maduracion')
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
            'index' => Pages\ListAgaves::route('/'),
            'create' => Pages\CreateAgave::route('/create'),
            'edit' => Pages\EditAgave::route('/{record}/edit'),
        ];
    }
}
