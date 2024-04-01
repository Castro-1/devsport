<?php

//Andrés Prda Rodríguez

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\View\View;

class ExerciseController extends Controller
{
    public function index(): View
    {
        $exercises = Exercise::all();

        $viewData = [];
        $viewData['exercises'] = $exercises;

        return view('exercise.index')->with('viewData', $viewData);
    }

    public function show(Exercise $exercise): View
    {
        $viewData = [];
        $viewData['exercise'] = $exercise;

        return view('exercise.show')->with('viewData', $viewData);
    }
}
