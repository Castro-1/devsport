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
        $viewData['routines'] = $routines;

        return view('routine.index')->with('viewData', $viewData);
    }
}
