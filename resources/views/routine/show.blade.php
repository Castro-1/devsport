{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')

    <h1>{{ __('routine.routine_information') }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('routine.routine_information') }}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>{{ __('routine.type') }}:</strong> {{ $viewData['routine']->getType() }}</li>
            </ul>
        </div>
    </div>

@endsection
