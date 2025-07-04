<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    //protected $table = 'maestros';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'fecha_nacimiento',
        'genero',
        'nacionalidad',
        'telefono',
        'foto',
        'correo',
        'anios_experiencia',
        'biografia',
        'country_id',
        'state_id',
        'city_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'maestro_marca', 'maestro_id', 'marca_id');
    }
}
