<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            Exercise::create([
                'name' => 'Exercise '.$i,
                'musclegroup' => 'Muscle Group '.rand(1, 5), // Suponiendo que tienes 5 grupos musculares
                'recommendations' => 'Recommendations for Exercise '.$i,
                'repetitions' => rand(5, 20),
                'sets' => rand(3, 5),
            ]);
        }
    }
}
