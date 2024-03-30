<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Definisce modello per i dati di default
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'qnt' => $this->faker->numberBetween(1, 100),
            'prezzo' => $this->faker->randomFloat(2, 0, 1000),
            'descrizione' => $this->faker->sentence()
        ];
    }
}
