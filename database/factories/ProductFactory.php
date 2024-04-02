<?php
// Author: Sara María Castrillón Ríos

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'category' => $this->faker->word,
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'stock' => $this->faker->numberBetween($min = 0, $max = 100),
        ];
    }
}
