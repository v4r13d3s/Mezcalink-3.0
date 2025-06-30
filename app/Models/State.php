<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'country_code',
        'country_name',
        'state_code',
        'type',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}