<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palenque extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'historia',
        'telefono',
        'correo',
        'foto',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
        'latitude',
        'longitude',
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

    public function maestro()
    {
        return $this->belongsTo(Maestro::class);
    }
}
