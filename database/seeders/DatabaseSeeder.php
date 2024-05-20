<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comentario;
use App\Models\Ingredients;
use App\Models\Instructions;
use App\Models\Receta;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)
        ->has(Receta::factory()
        ->has(Ingredients::factory()->count(3))
        ->has(Instructions::factory()->count(4))
        ->has(Tags::factory()->count(2))
        ->count(2))
        ->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'moderador' =>true,
        ]);

        $recetas = Receta::all()->where('privacy','public');
        foreach($recetas as $receta){
            Comentario::factory(2)->for($receta)->create();
        }
    }
}
