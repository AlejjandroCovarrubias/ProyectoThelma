<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['comentario', 'puntuacion'];

    //Relacion 1:n inversa
    public function receta(){
        return $this->belongsTo('Receta::class');
    }

    public function user(){
        return $this->belongsTo('User::class');
    }
}
