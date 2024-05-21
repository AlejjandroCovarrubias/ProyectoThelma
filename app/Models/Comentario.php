<?php

namespace App\Models;

use App\Models\User;
use App\Models\Receta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = ['comentario', 'puntuacion'];

    //Relacion 1:n inversa
    public function receta(){
        return $this->belongsTo(Receta::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reportadoBy()
    {
        return $this->belongsToMany(User::class,'user_comentario_reporte','comentario_id','user_id');
    }
}
