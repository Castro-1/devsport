{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')

@section('content')

    <h1>{{ __('trainingcontext.titleD') }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('trainingcontext.information_title') }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('trainingcontext.name') }}:</strong> {{ $viewData['trainingcontexts']->name }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.time') }}:</strong> {{ $viewData['trainingcontexts']->time }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.place') }}:</strong> {{ $viewData['trainingcontexts']->place }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.frequency') }}:</strong> {{ $viewData['trainingcontexts']->frequency }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.objectives') }}:</strong> {{ $viewData['trainingcontexts']->objectives }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.specifications') }}:</strong> {{ $viewData['trainingcontexts']->specifications }}</li>
            </ul>
        </div>
    </div>

    <br>

    <div>
        <a href="{{ route('routines.index', $viewData['trainingcontexts']->id) }}" class="btn btn-outline-secondary mb-2">
            {{ __('trainingcontext.view_routines_button') }}
        </a>
    </div>

@endsection

