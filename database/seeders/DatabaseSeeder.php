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
        User::factory(10)
        ->has(Receta::factory()
        ->has(Ingredients::factory()->count(5))
        ->has(Instructions::factory()->count(10))
        ->has(Tags::factory()->count(3))
        //->has(Comentario::factory()->count(3))
        ->count(3))
        ->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $recetas = Receta::all();
        foreach($recetas as $receta){
            Comentario::factory(3)->for($receta)->create();
        }

        /*
        User::factory(10)
            ->has(Comentario::factory()->count(4))
            ->create();

        /*User::factory(10)
        ->has(Clase::factory()
        ->has(Tarea::factory()->count(3))
        ->count(3), 'mis_clases')
        ->create();*/
    }
}
