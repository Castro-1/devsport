<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.admin')
@section('title', __('admin.create_product_title'))
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.create_product_title') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-8 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('admin.price') }}:</label>
            <div class="col-lg-8 col-md-6 col-sm-12">
              <input name="price" value="{{ old('price') }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">{{ __('admin.stock') }}:</label>
            <div class="col-lg-7 col-md-6 col-sm-12">
              <input name="stock" value="{{ old('stock') }}" type="number" class="form-control">
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
              <input name="category" value="{{ old('category') }}" type="text" class="form-control">
            </div>
          </div>
        <div class="col">
          &nbsp;
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">{{ __('admin.description') }}</label>
        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    {{ __('admin.manage_products_title') }}
  </div>
  <div class="card-body">

  <div class="row">
    <div class="col-6">
        <form action="{{ route('admin.product.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="{{ __('products.search.placeholder') }}"
                    name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit"
                    id="button-addon2">{{ __('products.search.submit') }}</button>
            </div>
        </form>
    </div>
    <div class="col-3 d-flex align-items-center justify-content-end mb-3 gap-2">
        <span class="mr-2" style="white-space: nowrap;">{{ __('products.filter.category') }} </span>
        <form action="{{ route('admin.product.index') }}" method="GET" class="flex-grow-1">
            <input type="hidden" name="search" value="{{ request('search') }}">
            <select class="form-control" name="category" onchange="this.form.submit()">
                <option value="" {{ request('category') == '' ? 'selected' : '' }}>
                    {{ __('products.filter.options.all') }}</option>
                @foreach ($viewData['categories'] as $category)
                    <option value="{{ $category['category'] }}"
                        {{ request('category') == $category['category'] ? 'selected' : '' }}>
                        {{ $category['category'] }}
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
          <th scope="col">{{ __('admin.category') }}</th>
          <th scope="col">{{ __('admin.edit') }}</th>
          <th scope="col">{{ __('admin.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>{{ $product->getCategory() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
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
