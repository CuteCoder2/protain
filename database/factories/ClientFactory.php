<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_client' => fake()->unique()->userName(),
            'nom' => fake()->firstName(),
            'prenom' => fake()->lastName(),
            'tel' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'nom_entre' => fake()->company(),
            'localisation' => fake()->city(),
        ];
    }
}
