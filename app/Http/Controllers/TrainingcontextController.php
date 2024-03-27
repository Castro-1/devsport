<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainingcontext;
use App\Models\Routine;

class TrainingcontextController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $trainingcontexts = Trainingcontext::where('users_id', $user_id)->get();

        return view('trainingcontext.index', compact('trainingcontexts'));
    }

    public function create(Request $request)
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create trainingcontext";

        return view('trainingcontext.create')->with("viewData",$viewData);
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user_id = $request->user()->id;
        $request->merge(['users_id' => $user_id]);
        $request->validate([
            'time' => 'required|integer',
            'place' => 'required|string',
            'frequency' => 'required|integer',
            'objectives' => 'required|string',
            'specifications' => 'required|string',
        ]);
        Trainingcontext::create($request->only(["users_id", "time", "place", "frequency", "objectives", "specifications"]));

        return back();

    }

    public function show(Trainingcontext $trainingcontext)
    {
        $routines = Routine::where('trainingcontexts_id', $trainingcontext->id)->get();
        return view('trainingcontext.show', compact('trainingcontext', 'routines'));
    }
}
