<!-- Andrés Prada Rodriguez  -->

@extends('layouts.app')

@section('content')

    <h1>{{ __('exercise.exercise_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('exercise.exercise_information') }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('exercise.name') }}:</strong> {{ $viewData['exercise']->getName() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.muscle_group') }}:</strong> {{ $viewData['exercise']->getMusclegroup() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.recommendations') }}:</strong> {{ $viewData['exercise']->getRecommendations() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.repetitions') }}:</strong> {{ $viewData['exercise']->getRepetitions() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.sets') }}:</strong> {{ $viewData['exercise']->getSets() }}</li>
            </ul>
        </div>
    </div>

@endsection

