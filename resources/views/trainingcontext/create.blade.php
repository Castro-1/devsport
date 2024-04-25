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
            <form class="form-row row" method="POST" action="{{ route('trainingcontext.save') }}" >
                @csrf
                <div class="form-group col-md-6">
                    <label for="name">{{ __('trainingcontext.name') }}</label>
                    <br>
                    <input class="form-control"  type="text" id="name" name="name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="time">{{ __('trainingcontext.time') }}</label>
                    <br>
                    <input class="form-control"  type="number" id="time" name="time" required min="0" step="1">
                </div>
                <div class="form-group col-md-6">
                    <label for="place">{{ __('trainingcontext.place') }}</label>
                    <br>
                    <input class="form-control" type="text" id="place" name="place" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="frequency">{{ __('trainingcontext.frequency') }}</label>
                    <br>
                    <input class="form-control" type="text" id="frequency" name="frequency" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="objectives">{{ __('trainingcontext.objectives') }}</label>
                    <br>
                    <textarea class="form-control" id="objectives" name="objectives" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="specifications">{{ __('trainingcontext.specifications') }}</label>
                    <br>
                    <textarea class="form-control" id="specifications" name="specifications" required></textarea>
                </div>
                <br>
                <div>
                    <button class="btn btn-outline-secondary mb-2" type="submit">{{ __('trainingcontext.submit') }}</button>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
