{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')

@section('title', $viewData['title'])

@section('subtitle', $viewData['title'])

@section('content')

    <h1>{{ __('routine.routine_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong></strong> {{ $viewData['routine']->getSpecifications() }}</li>
            </ul>
        </div>
    </div>
    <div>
        <a href="{{ route('routine.generateReport', ['routine_id' => $viewData['routine']->getId()]) }}" class="btn btn-outline-secondary">{{ __('exercise.generate_pdf') }}</a>
    </div>
    <br>
    <form action="{{ route('routine.delete', ['routine_id' => $viewData['routine']->getId(), 'trainingcontext_id' => $viewData['trainingcontext_id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-secondary mb-2" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">
            {{ __('Delete') }}
        </button>
    </form>

@endsection
