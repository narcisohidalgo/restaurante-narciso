<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarjeta>
 */
class TarjetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'num_tarjeta' => fake()->randomNumber(8) . fake()->randomNumber(8),
            'mes_caducidad' => fake()->numberBetween(1, 12),
            'anyo_caducidad' => fake()->numberBetween(2022, 2023),
            'cvv' => fake()->numberBetween(200, 999),
            'id_cliente' => fake()->randomElement(User::all())['id']
        ];
    }
}
