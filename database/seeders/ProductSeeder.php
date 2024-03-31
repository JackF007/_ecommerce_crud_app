<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Popola il DB con i dati random dal seed
     */
    public function run(): void
    {
            Product::factory()->count(10)->create();
        
    }
}
