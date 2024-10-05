<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\practica>
 */
class PracticaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name,
            'edad' => fake()->numberBetween(18, 67),
            // 'edad'=>fake()->randomNumber(2),
            'estado' => fake()->randomElement([0, 1]),
            'tipo' => fake()->randomElement(['Aceptado', 'Negado'])
        ];
    }
}
