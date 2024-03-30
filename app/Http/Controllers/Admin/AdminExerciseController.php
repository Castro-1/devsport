<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminExerciseController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = $request->get('search');
        $musclegroup = $request->get('musclegroup');

        $viewData = [];

        $exercises = Exercise::query();

        if ($searchTerm) {
            $exercises->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                    ->orWhere('musclegroup', 'like', '%'.$searchTerm.'%');
            });
            $viewData['searchPerformed'] = true;
        }

        if ($musclegroup) {
            $exercises->where('musclegroup', $musclegroup);
        }


        $viewData['title'] = 'Admin Page - Exercises - Online Store';
        $viewData['musclegroup'] = Exercise::select('musclegroup')->distinct()->get();
        $viewData['exercises'] = $exercises->get();

        return view('admin.exercise.index')->with('viewData', $viewData);
    }


    public function store(Request $request): RedirectResponse
    {
        Exercise::validate($request);

        $newExercise = new Exercise();
        $newExercise->setName($request->input('name'));
        $recommendations = $request->input('recommendations');
        if ($recommendations !== null) {
            $newExercise->setRecommendations($recommendations);
        }
        $newExercise->setMuscleGroup($request->input('musclegroup'));
        $newExercise->setRepetitions($request->input('repetitions'));
        $newExercise->setSets($request->input('sets'));
        $newExercise->setImage('game.png');
        $newExercise->save();

        return back();
    }


    public function delete($id): RedirectResponse
    {
        Exercise::destroy($id);

        return back();
    }

    public function edit($id): View
    {
        $viewData = [];
        $viewData['title'] = 'Admin Page - Edit Exercise - Online Store';
        $viewData['exercise'] = Exercise::findOrFail($id);

        return view('admin.exercise.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        Exercise::validate($request);

        $exercise = Exercise::findOrFail($id);
        $exercise->setName($request->input('name'));
        $exercise->setRepetitions($request->input('repetitions'));
        $exercise->setSets($request->input('sets'));
        $exercise->setMuscleGroup($request->input('musclegroup'));
        $exercise->setRecommendations($request->input('recommendations'));
        
        $exercise->save();

        return redirect()->route('admin.exercise.index');
    }

}
