<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable=['tag'];

    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}
