<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['nome_categoria' => 'Elettronica']);
        Category::create(['nome_categoria' => 'Libri']);
        Category::create(['nome_categoria' => 'Casalinghi']);
        Category::create(['nome_categoria' => 'Bricolage']);
        Category::create(['nome_categoria' => 'Abbigliamento']);
        Category::create(['nome_categoria' => 'Alimentari']);
        Category::create(['nome_categoria' => 'Informatica']);
        
    }
}