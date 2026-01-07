<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'nom' => $this->faker->word(),
        'categorie' => $this->faker->randomElement(['Électronique', 'Mode', 'Maison']),
        'quantite' => $this->faker->numberBetween(1, 100),
        'prix' => $this->faker->randomFloat(2, 2000, 50000), // Prix entre 10 et 500
    ];
}
}
