{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

    <h1>{{ __('trainingcontext.titleD') }}</h1>

    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('trainingcontext.name') }}</strong> {{ $viewData['trainingcontexts']->getName() }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.time') }}</strong> {{ $viewData['trainingcontexts']->getTime() }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.place') }}</strong> {{ $viewData['trainingcontexts']->getPlace() }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.frequency') }}</strong> {{ $viewData['trainingcontexts']->getFrequency() }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.objectives') }}</strong> {{ $viewData['trainingcontexts']->getObjectives() }}</li>
                <li class="list-group-item"><strong>{{ __('trainingcontext.specifications') }}</strong> {{ $viewData['trainingcontexts']->getSpecifications() }}</li>
            </ul>
        </div>
    </div>

    <br>

    <div>
        <a href="{{ route('routines.index', $viewData['trainingcontexts']->id) }}" class="btn btn-outline-secondary mb-2">
            {{ __('trainingcontext.view_routines_button') }}
        </a>
    </div>

    <div>
        <form action="{{ route('openai.generateroutine', ['trainingcontext_id' => $viewData['trainingcontexts']->id, 'user_id' => $viewData['user']->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-secondary mb-2">
                {{ __('openai.button.generateroutine') }}
            </button>
        </form>
    </div>


@endsection
