<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agave extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'foto',
        'tiempo_maduracion',
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
        return $this->belongsToMany(Marca::class, 'agave_marca', 'agave_id', 'marca_id');
    }
}
