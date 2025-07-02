<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'nombre',
        'certificado_dom',
        'logo',
        'descripcion',
        'historia',
        'eslogan',
        'anio_fundacion',
        'telefono',
        'correo',
        'redes_sociales',
        'sitio_web',
        'pais_origen',
        'tipos_agave',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
    ];

    public function maestro()
    {
        return $this->belongsTo(Maestro::class);
    }

    public function palenque()
    {
        return $this->belongsTo(Palenque::class);
    }

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
}
