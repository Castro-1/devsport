<?php

//Andrés Prda Rodríguez

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\View\View;

class RoutineController extends Controller
{
    public function index($trainingcontext_id): View
    {
        $routines = Routine::where('trainingcontexts_id', $trainingcontext_id)->get();

        $viewData = [];
        $viewData['title'] = __('routine.title.index');
        $viewData['subtitle'] = __('routine.subtitle.index');
        $viewData['routines'] = $routines;

        return view('routine.index')->with('viewData', $viewData);
    }

    public function show(int $routine_id): View
    {
        $routine = Routine::findOrFail($routine_id);
        $exercises = $routine->exercises;
        $viewData = [];
        $viewData['title'] = __('routine.title.show');
        $viewData['subtitle'] = __('routine.subtitle.show');
        $viewData['routine'] = $routine;
        $viewData['exercises'] = $exercises;

        return view('routine.show')->with('viewData', $viewData);
    }
}
