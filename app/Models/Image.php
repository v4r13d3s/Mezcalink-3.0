<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Relación polimorfica

    use HasFactory;

    public function imageable(){
        return $this->morphTo();
    }


}
