<?php

//Andrés Prda Rodríguez

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Interfaces\ReportBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RoutineController extends Controller
{
    protected $reportBuilder;

    public function __construct(ReportBuilder $reportBuilder)
    {
        $this->reportBuilder = $reportBuilder;
    }

    public function index($trainingcontext_id): View
    {
        $routines = Routine::where('trainingcontexts_id', $trainingcontext_id)->get();

        $viewData = [];
        $viewData['title'] = __('routine.title.index');
        $viewData['subtitle'] = __('routine.subtitle.index');
        $viewData['routines'] = $routines;
        $viewData['trainingcontext_id'] = $trainingcontext_id;

        return view('routine.index')->with('viewData', $viewData);
    }

    public function show(int $routine_id, int $trainingcontext_id): View
    {
        $routine = Routine::findOrFail($routine_id);
        $exercises = $routine->exercises;
        $viewData = [];
        $viewData['title'] = __('routine.title.show');
        $viewData['subtitle'] = __('routine.subtitle.show');
        $viewData['routine'] = $routine;
        $viewData['exercises'] = $exercises;
        $viewData['trainingcontext_id'] = $trainingcontext_id;

        return view('routine.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('routine.title.create');
        $viewData['subtitle'] = __('routine.subtitle.create');

        return view('routine.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $newRoutine = new Routine();
        $newRoutine->name = $request->input('name');
        $newRoutine->trainingcontexts_id = $request->input('trainingcontexts_id');

        $newRoutine->save();

        return back();
    }


    public function generateReport(int $routine_id)
    {
        $routine = Routine::findOrFail($routine_id);

        // Inject the ReportBuilder dependency
        return $this->reportBuilder->generateReport($routine);
        return back();
    }

    public function delete(int $routine_id, int $trainingcontext_id): view
    {
        $routine = Routine::findOrFail($routine_id);
        $routine->delete();

        $routines = Routine::where('trainingcontexts_id', $trainingcontext_id)->get();

        $viewData = [];
        $viewData['title'] = __('routine.title.index');
        $viewData['subtitle'] = __('routine.subtitle.index');
        $viewData['routines'] = $routines;
        $viewData['trainingcontext_id'] = $trainingcontext_id;

        return view('routine.index')->with('viewData', $viewData);
    }

}
