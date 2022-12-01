<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consolas extends Model
{
    use HasFactory;
    public function videojuego()
    {
        return $this -> hasMany(Videojuego::class);
    }
}
