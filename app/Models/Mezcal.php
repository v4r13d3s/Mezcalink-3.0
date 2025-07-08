<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mezcal extends Model
{
    protected $fillable = [
        "nombre",
        "categoria",
        "tipo",
        "precio_regular",
        "descripcion",
        "contenido_alcohol",
        "tamanio_bote",
        "proveedor",
        "marca_id",
        "country_id",
        "state_id",
        "city_id",
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

    public function agave()
    {
        return $this->belongsToMany(Agave::class, 'agave_mezcal', 'mezcal_id', 'agave_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}
