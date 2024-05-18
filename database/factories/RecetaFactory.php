<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receta>
 */
class RecetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_recipe' => fake()->sentence(),
            'descrip_recipe' => fake()->paragraph(2),
            'privacy' => fake()->randomElement(['public', 'private']),
            //'ubiFotoReceta'=>$this->faker->image('public/storage/',600,480,null,false),
            //'mimeFotoReceta'=>'image/png',
        ];
    }
}
