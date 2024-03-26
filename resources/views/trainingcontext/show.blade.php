@extends('layouts.app')

@section('content')
    <h1>Training Context Details</h1>
    <p><strong>Time:</strong> {{ $trainingcontext->time }}</p>
    <p><strong>Place:</strong> {{ $trainingcontext->place }}</p>

    <h2>Routines Associated with this Training Context</h2>
    @if ($routines->isEmpty())
        <p>No routines found for this training context.</p>
    @else
        <ul>
            @foreach ($routines as $routine)
                <li>{{ $routine->name }} - {{ $routine->description }}</li>
            @endforeach
        </ul>
    @endif
@endsection
