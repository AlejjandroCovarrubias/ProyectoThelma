<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receta extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function instructions()
    {
        return $this->hasMany(Instructions::class);
    }

    public function tags()
    {
        return $this->hasMany(Tags::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class,'user_receta','recipe_id','user_id');
    }
    public function reportadoBy()
    {
        return $this->belongsToMany(User::class,'user_receta','recipe_id','user_id');
    }
}
