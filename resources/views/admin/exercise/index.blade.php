<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.create_exercises_title') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.exercise.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-5 col-md-6 col-sm-12 col-form-label">{{ __('admin.repetitions') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="repetitions" value="{{ 12 }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.sets') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="sets" value="{{ 4 }}" type="number" class="form-control">
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
            <div class="col-lg-8 col-md-6 col-sm-12">
              <input name="musclegroup" value="{{ old('musclegroup') }}" type="text" class="form-control">
            </div>
          </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">{{ __('admin.recommendations') }}</label>
        <textarea class="form-control" name="recommendations" rows="3">{{ old('recommendations') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    {{ __('admin.manage_exercises_title') }}
  </div>
  <div class="card-body">
  <div class="col-6">
        <form action="{{ route('admin.exercise.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="{{ __('admin.search_exercises') }}"
                    name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit"
                    id="button-addon2">{{ __('products.search.submit') }}</button>
            </div>
        </form>
    </div>
    <div class="col-3 d-flex align-items-center justify-content-end mb-3 gap-2">
        <span class="mr-2" style="white-space: nowrap;">{{ __('admin.muscle_group') }} </span>
        <form action="{{ route('admin.exercise.index') }}" method="GET" class="flex-grow-1">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <select class="form-control" name="musclegroup" onchange="this.form.submit()">
                <option value="" {{ request('musclegroup') == '' ? 'selected' : '' }}>
                    {{ __('admin.all_exercises') }}</option>
                @foreach ($viewData['musclegroup'] as $musclegroup)
                    <option value="{{ $musclegroup['musclegroup'] }}"
                        {{ request('musclegroup') == $musclegroup['musclegroup'] ? 'selected' : '' }}>
                        {{ $musclegroup['musclegroup'] }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">{{ __('admin.name') }}</th>
          <th scope="col">{{ __('admin.muscle_group') }}</th>
          <th scope="col">{{ __('admin.edit') }}</th>
          <th scope="col">{{ __('admin.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["exercises"] as $exercise)
        <tr>
          <td>{{ $exercise->getId() }}</td>
          <td>{{ $exercise->getName() }}</td>
          <td>{{ $exercise->getmusclegroup() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.exercise.edit', ['id'=> $exercise->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.exercise.delete', $exercise->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
