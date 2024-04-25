<!-- Andrés Prada Rodriguez  -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('exercise.exercise_list') }}</h1>
        @if ($viewData['exercises']->isEmpty())
            <p>{{ __('exercise.no_exercises_found') }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('exercise.name') }}</th>
                        <th>{{ __('exercise.description') }}</th>
                        <th>{{ __('exercise.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['exercises'] as $exercise)
                        <tr>
                            <td>{{ $exercise->getName() }}</td>
                            <td>{{ $exercise->getDescription() }}</td>
                            <td>
                                <a href="{{ route('exercise.show', $exercise->id) }}" class="btn btn-outline-secondary mb-2">{{ __('exercise.view') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('exercise.exercise_list') }}</h1>
        @if ($viewData['exercises']->isEmpty())
            <p>{{ __('exercise.no_exercises_found') }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('exercise.name') }}</th>
                        <th>{{ __('exercise.description') }}</th>
                        <th>{{ __('exercise.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['exercises'] as $exercise)
                        <tr>
                            <td>{{ $exercise->getName() }}</td>
                            <td>{{ $exercise->getDescription() }}</td>
                            <td>
                                <a href="{{ route('exercise.show', $exercise->id) }}" class="btn btn-outline-secondary mb-2">{{ __('exercise.view') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
