@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('products.search.placeholder') }}"
                            name="search" value="{{ request('search') }}">
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        <button class="btn btn-outline-secondary" type="submit"
                            id="button-addon2">{{ __('products.search.submit') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end mb-3 gap-2">
                <span class="mr-2" style="white-space: nowrap;">{{ __('products.filter.category') }} </span>
                <form action="{{ route('product.index') }}" method="GET" class="flex-grow-1">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
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
            <div class="col-3 d-flex align-items-center justify-content-end mb-3 gap-2">
                <span class="mr-2" style="white-space: nowrap;">{{ __('products.filter.sort') }} </span>
                <form action="{{ route('product.index') }}" method="GET" class="flex-grow-1">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <select class="form-control" name="sort" onchange="this.form.submit()">
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                            {{ __('products.filter.options.asc') }}</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                            {{ __('products.filter.options.desc') }}</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            @if ($viewData['products']->isEmpty())
                <p>{{ __('products.search.not_found') }}</p>
            @else
                @foreach ($viewData['products'] as $product)
                    <div class="col-md-4 col-lg-3 mb-2">
                        <div class="card text-black">
                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                                <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
                            </a>
                            <div class="card-body text-center">
                                <p>{{ $product->getName() }}</p>
                                <p>${{ $product->getPrice() }}</p>
                                <a href="{{ route('cart.add', ['id' => $product->getId()]) }}"
                                    class="btn bg-primary text-white">{{ __('products.button.add_to_cart') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if (!empty($viewData['searchPerformed']))
                <a href="{{ route('product.index') }}"
                    class="btn bg-primary text-white">{{ __('products.search.return') }}</a>
            @endif
        </div>
    </div>
@endsection
