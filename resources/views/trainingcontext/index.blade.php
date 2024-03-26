@extends('layouts.app')

@section('content')
    <h1>Training Contexts</h1>

    @if ($trainingcontexts->isEmpty())
        <p>No training contexts found.</p>
        <a href="{{ route('trainingcontext.create') }}">Create New Training Context</a>
    @else
        <ul>
            @foreach ($trainingcontexts as $trainingcontext)
                <li>
                    <a href="{{ route('trainingcontext.show', $trainingcontext) }}">
                        Time: {{ $trainingcontext->time }} - Place: {{ $trainingcontext->place }}
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('trainingcontext.create') }}">Create New Training Context</a>
    @endif
@endsection
