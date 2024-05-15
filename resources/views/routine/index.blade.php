{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app') 
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('routine.routines') }}</div>
                <div class="card-body">
                    @if ($viewData['routines']->isEmpty())
                        <p>{{ __('routine.no_routines_found') }}</p>
                    @endif
                    <ul>
                        @foreach ($viewData['routines'] as $routine)
                            <li>{{ $routine->getName() }}</li>
                            <a href="{{ route('routine.show', $routine->getId() ) }}" class="btn btn-outline-secondary">{{ __('routine.view_details_button') }}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

