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
        $viewData['title'] = __('trainingcontext.title.index');
        $viewData['user'] = $user;

        return view('trainingcontext.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('trainingcontext.title.create');

        return view('trainingcontext.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $user_id = $request->user()->id;
        $newTrainingcontext = new Trainingcontext();
        $newTrainingcontext->setName($request->input('name'));
        $newTrainingcontext->setTime($request->input('time'));
        $newTrainingcontext->setPlace($request->input('place'));
        $newTrainingcontext->setFrequency($request->input('frequency'));
        $newTrainingcontext->setObjectives($request->input('objectives'));
        $newTrainingcontext->setSpecifications($request->input('specifications'));
        $newTrainingcontext->setUsers_Id($user_id);

        $newTrainingcontext->save();

        return back();
    }

    public function show(Request $request, string $id): View
    {
        $trainingcontext = Trainingcontext::findOrFail($id);
        $routines = Routine::where('trainingcontexts_id', $id)->get();
        $user = $request->user();

        $viewData = [];
        $viewData['title'] = __('trainingcontext.title.show');
        $viewData['subtitle'] = __('trainingcontext.subtitle.show');
        $viewData['trainingcontexts'] = $trainingcontext;
        $viewData['routines'] = $routines;
        $viewData['user'] = $user;

        return view('trainingcontext.show')->with('viewData', $viewData);
    }
}
