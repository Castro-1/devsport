@extends('layouts.app')
@section('content')

    <h1>Training Context Details</h1>
    <p><strong>Time:</strong> {{ $trainingcontext->time }}</p>
    <p><strong>Place:</strong> {{ $trainingcontext->place }}</p>
    <p><strong>Frequency:</strong> {{ $trainingcontext->frequency }}</p>
    <p><strong>Objectives:</strong> {{ $trainingcontext->objectives }}</p>
    <p><strong>Specifications:</strong> {{ $trainingcontext->specifications }}</p>
    <br>
    <div>
        <a href="{{ route('routines.index', $trainingcontext->id) }}" class="btn btn-outline-secondary mb-2">
            View Routines for this Training Context
        </a>
    </div>
@endsection
