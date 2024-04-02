<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.admin')
@section('title', __('admin.edit_exercise_title'))
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.edit_exercise_title') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.exercise.update', ['id'=> $viewData['exercise']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['exercise']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('admin.repetitions') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="repetitions" value="{{ $viewData['exercise']->getRepetitions() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.sets') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="sets" value="{{ $viewData['exercise']->getSets() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.image') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="row">
            <label class="col-lg-4 col-md-3 col-sm-10">{{ __('admin.muscle_group') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="musclegroup" value="{{ $viewData['exercise']->getmusclegroup() }}" type="text" class="form-control">
            </div>
          </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">{{ __('admin.recommendations') }}: </label>
        <textarea class="form-control" name="recommendations"
          rows="3">{{ $viewData['exercise']->getRecommendations() }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ __('admin.edit_button') }}</button>
    </form>
  </div>
</div>
@endsection
