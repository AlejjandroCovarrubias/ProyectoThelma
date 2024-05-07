<?php

namespace App\Models;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructions extends Model
{
    use HasFactory;

    protected $fillable=['instruccion'];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
