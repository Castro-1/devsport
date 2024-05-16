{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')

    <h1>{{ __('routine.routine_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong></strong> {{ $viewData['routine']->getType() }}</li>
            </ul>
        </div>
    </div>
    <ul>
        <a href="{{ route('exercise.index') }}" class="btn btn-outline-secondary">{{ __('exercise.view_details_button') }}</a>
    </ul>

@endsection
