<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Prima il seeder per la categoria poi prodotti
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);

    }
}
