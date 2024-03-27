@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Routines') }}</div>
                <div class="card-body">
                    @if ($routines->isEmpty())
                        <p>{{ __('No routines found') }}</p>
                    @endif
                    <ul>
                        @foreach ($routines as $routine)
                            <li>{{ $routine->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
