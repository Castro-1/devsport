{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('trainingcontext.titleC') }}</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif  
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="form-row row" method="POST" action="{{ route('trainingcontext.save') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.name') }}</label>

                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.time') }}</label>

                        <div class="col-md-6">
                            <input type="number" id="time" name="time" class="form-control @error('time') is-invalid @enderror" required min="0" step="1">
                            <small class="form-text text-muted">{{ __('Minutes per day') }}</small>

                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.place') }}</label>

                        <div class="col-md-6">
                            <input type="text" id="place" name="place" class="form-control @error('place') is-invalid @enderror" required>

                            @error('place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="frequency" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.frequency') }}</label>

                        <div class="col-md-6">
                            <input type="number" id="frequency" name="frequency" class="form-control @error('frequency') is-invalid @enderror" required min="1" max="7" step="1">
                            <small class="form-text text-muted">{{ __('Times per week') }}</small>

                            @error('frequency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="objectives" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.objectives') }}</label>

                        <div class="col-md-6">
                            <textarea id="objectives" name="objectives" class="form-control @error('objectives') is-invalid @enderror" required></textarea>

                            @error('objectives')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="specifications" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.specifications') }}</label>

                        <div class="col-md-6">
                            <textarea id="specifications" name="specifications" class="form-control @error('specifications') is-invalid @enderror" required></textarea>

                            @error('specifications')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-secondary mb-2">
                                {{ __('trainingcontext.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
