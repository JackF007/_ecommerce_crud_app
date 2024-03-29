<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
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
