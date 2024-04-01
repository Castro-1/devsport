<?php

//Andrés Prda Rodríguez

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\Trainingcontext;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrainingcontextController extends Controller
{
    public function index(Request $request): View
    {
        $user_id = $request->user()->id;
        $user = $request->user();
        $trainingcontexts = Trainingcontext::where('users_id', $user_id)->get();

        $viewData = [];
        $viewData['trainingcontexts'] = $trainingcontexts;
        $viewData['title'] = 'Training Context Index';
        $viewData['user'] = $user;

        return view('trainingcontext.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create trainingcontext';

        return view('trainingcontext.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $user_id = $request->user()->id;
        $request->merge(['users_id' => $user_id]);
        $request->validate([
            'name' => 'required|string',
            'time' => 'required|integer',
            'place' => 'required|string',
            'frequency' => 'required|integer',
            'objectives' => 'required|string',
            'specifications' => 'required|string',
        ]);
        Trainingcontext::create($request->only(['users_id', 'name', 'time', 'place', 'frequency', 'objectives', 'specifications']));

        return back();
    }

    public function show(Trainingcontext $trainingcontext): View
    {
        $routines = Routine::where('trainingcontexts_id', $trainingcontext->id)->get();

        $viewData = [];
        $viewData['trainingcontexts'] = $trainingcontext;
        $viewData['routines'] = $routines;

        return view('trainingcontext.show')->with('viewData', $viewData);
    }
}
