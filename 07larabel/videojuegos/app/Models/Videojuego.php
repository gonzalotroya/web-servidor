<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;
    public function companias()
    {
        return $this -> belongsTo(Companias::class);
    }
    public function consolas()
    {
        return $this -> belongsToMany(consolas::class,'consolas_videojuegos','videojuego_id','consola_id');
    }
}
