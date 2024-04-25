<!-- Andrés Prada Rodriguez  -->

@extends('layouts.app')

@section('content')

    <h1>{{ __('exercise.exercise_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('exercise.exercise_information') }}</h5>
            <img src="{{ $viewData['trainingcontexts']->image }}" alt="{{ __('exercise.exercise_image') }}" class="img-fluid mb-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('exercise.name') }}:</strong> {{ $viewData['trainingcontexts']->getName() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.muscle_group') }}:</strong> {{ $viewData['trainingcontexts']->getMusclegroup() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.recommendations') }}:</strong> {{ $viewData['trainingcontexts']->getRecommendations() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.repetitions') }}:</strong> {{ $viewData['trainingcontexts']->getRepetitions() }}</li>
                <li class="list-group-item"><strong>{{ __('exercise.sets') }}:</strong> {{ $viewData['trainingcontexts']->getSets() }}</li>
            </ul>
        </div>
    </div>

@endsection

