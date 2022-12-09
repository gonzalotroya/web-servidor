<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consolas extends Model
{
    use HasFactory;
   
    public function videojuegos()
    {
        return $this -> belongsToMany(Videojuego::class,'consolas_videojuegos','consola_id','videojuego_id');
    }
}
