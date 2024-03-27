<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            Exercise::create([
                'name' => 'Exercise ' . $i,
                'musclegroup' => 'Muscle Group ' . rand(1, 5), // Suponiendo que tienes 5 grupos musculares
                'recommendations' => 'Recommendations for Exercise ' . $i,
                'repetitions' => rand(5, 20),
                'sets' => rand(3, 5),
            ]);
        }
    }
}
