<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;
    public function consolas()
    {
        return $this -> belongsTo(consolas::class);
    }
    public function companias()
    {
        return $this -> belongsTo(companias::class);
    }
}
