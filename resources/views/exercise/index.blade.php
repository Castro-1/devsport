@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Exercise List</h1>
        @if ($exercises->isEmpty())
            <p>No exercises found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exercises as $exercise)
                        <tr>
                            <td>{{ $exercise->name }}</td>
                            <td>{{ $exercise->description }}</td>
                            <td>
                            <a href="{{ route('exercise.show', $exercise->id) }}" class="btn btn-outline-secondary mb-2">View</a>
                    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection