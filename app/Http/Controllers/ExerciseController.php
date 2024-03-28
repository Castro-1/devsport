<?php

namespace App\Http\Controllers;

use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all();

        return view('exercise.index', compact('exercises'));
    }

    public function show(Exercise $exercise)
    {
        return view('exercise.show', compact('exercise'));
    }
}
