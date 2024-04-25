<?php

// Author: Sara María Castrillón Ríos

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(10)->create();
    }
}
