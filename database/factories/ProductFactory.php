<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductFactory extends Factory
{
    /**
     * Definisce modello per i dati di default
     *
     * @return array<string, mixed>
     */

     
    public function definition(): array
    {
        // Ritorna elenco di tutti i file nella cartella delle immagini
        $imageFiles = collect(Storage::files('public/images'))->map(function ($path) {
            return basename($path);
        })->toArray();
    
        $image = !empty($imageFiles) ? $this->faker->randomElement($imageFiles) : null;

        return [
            'nome' => $this->faker->word(),
            'qnt' => $this->faker->numberBetween(1, 100),
            'prezzo' => $this->faker->randomFloat(2, 0, 1000),
            'descrizione' => $this->faker->sentence(),
            'image' => $image
        ];
    }
}