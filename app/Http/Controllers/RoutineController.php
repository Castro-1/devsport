<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routine;

class RoutineController extends Controller
{
    public function index($trainingcontext_id)
    {
        $routines = Routine::where('trainingcontexts_id', $trainingcontext_id)->get();
        return view('routine.index', compact('routines'));
    }
}
