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
        'country_id',
        'state_id',
        'city_id',
        'address',
        'postal_code',
    ];

    protected $casts = [
        'redes_sociales' => 'array',
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

    // Relaciones many-to-many con las tablas pivot correctas
    public function maestro()
    {
        return $this->belongsToMany(Maestro::class, 'maestro_marca', 'marca_id', 'maestro_id');
    }

    public function agave()
    {
        return $this->belongsToMany(Agave::class, 'agave_marca', 'marca_id', 'agave_id');
    }

    public function palenque()
    {
        return $this->belongsToMany(Palenque::class, 'palenque_marca', 'marca_id', 'palenque_id');
    }
}