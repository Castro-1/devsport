@extends('layouts.app')

@section('content')
    <h1>Training Contexts</h1>

    @if ($trainingcontexts->isEmpty())
        <p>No training contexts found.</p>
        <a href="{{ route('trainingcontext.create') }}">Create New Training Context</a>
    @else
        <ul>
            @foreach ($trainingcontexts as $trainingcontext)
                <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
                <div class="card-body text-center">
                    <a href="{{ route('trainingcontext.show', $trainingcontext) }}"
                    class="btn btn-outline-secondary mb-2">{{ $trainingcontext["place"] }}</a>
                </div> 
                </div>
            </div>
            @endforeach
        </ul>
        <a class="btn btn-outline-secondary mb-2" href="{{ route('trainingcontext.create') }}">Create New Training Context</a>
    @endif
@endsection
