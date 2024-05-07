<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function instructions()
    {
        return $this->hasMany(instructions::class);
    }

    public function tags()
    {
        return $this->hasMany(Tags::class);
    }

    public function ingredients()
    {
        return $this->hasMany(ingredients::class);
    }
}
