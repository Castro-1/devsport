<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.admin')
@section('title', __('admin.edit_product_title'))
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.edit_product_title') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.price') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.stock') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="stock" value="{{ $viewData['product']->getStock() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">{{ __('admin.image') }}:</label>
            <div class="col-lg-9 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="row">
            <label class="col-lg-3 col-md-3 col-sm-10">{{ __('admin.category') }}:</label>
            <div class="col-lg-9 col-md-6 col-sm-12">
              <input name="category" value="{{ $viewData['product']->getCategory() }}" type="text" class="form-control">
            </div>
          </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">{{ __('admin.description') }}</label>
        <textarea class="form-control" name="description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>

      <div class="row">
        <label class="col-lg-3 col-md-3 col-sm-10">{{ __('admin.visibility') }}:</label>
        <div class="col-lg-9 col-md-6 col-sm-12">
          <select class="form-control" name="visible">
            <option value="1" {{ $viewData['product']->getVisibility() ? 'selected' : '' }}>{{ __('admin.visible') }}</option>
            <option value="0" {{ !$viewData['product']->getVisibility() ? 'selected' : '' }}>{{ __('admin.hidden') }}</option>
          </select>
        </div>
      </div>
      <div class="col">
          &nbsp;
      </div>
      <button type="submit" class="btn btn-primary">{{ __('admin.edit') }}</button>
    </form>
  </div>
</div>
@endsection
