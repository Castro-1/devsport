@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <form action="{{ route('product.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{ __('products.search.placeholder') }}"
                            name="search" value="{{ request('search') }}">
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        <button class="btn btn-outline-secondary" type="submit"
                            id="button-addon2">{{ __('products.search.submit') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-end gap-2">
                <span class="mr-2" style="white-space: nowrap;">{{ __('products.filter.category') }}</span>
                <form action="{{ route('product.index') }}" method="GET" class="flex-grow-1">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                    <div class="input-group">
                        <select class="form-select custom-select" name="category" onchange="this.form.submit()">
                            <option value="" {{ request('category') == '' ? 'selected' : '' }}>
                                {{ __('products.filter.options.all') }}</option>
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{ $category['category'] }}"
                                    {{ request('category') == $category['category'] ? 'selected' : '' }}>
                                    {{ $category['category'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-end gap-2">
                <span class="mr-2" style="white-space: nowrap;">{{ __('products.filter.sort') }}</span>
                <form action="{{ route('product.index') }}" method="GET" class="flex-grow-1">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <div class="input-group">
                        <select class="form-select custom-select" name="sort" onchange="this.form.submit()">
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>
                                {{ __('products.filter.options.asc') }}</option>
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>
                                {{ __('products.filter.options.desc') }}</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if ($viewData['products']->isEmpty())
                <p class="text-center">{{ __('products.search.not_found') }}</p>
            @else
                @foreach ($viewData['products'] as $product)
                    @if ($product->getVisibility() == 1)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card text-black card-container shadow-sm">
                                <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="product-link" title="{{ __('products.label.view_details') }}">
                                    <img src="{{ URL::asset($product->getImage()) }}" class="card-img-top img-card">
                                    <div class="overlay">
                                        <div class="text">{{ __('products.label.view_details') }}</div>
                                    </div>
                                </a>
                                <div class="card-body text-center">
                                    <p class="product-name">{{ $product->getName() }}</p>
                                    <p>${{ $product->getPrice() }}</p>
                                    <a href="{{ route('cart.add', ['id' => $product->getId()]) }}"
                                        class="btn btn-outline-danger mb-2">{{ __('products.button.add_to_cart') }}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            @if (!empty($viewData['searchPerformed']))
                <a href="{{ route('product.index') }}"
                    class="btn btn-outline-secondary mb-2">{{ __('products.search.return') }}</a>
            @endif
        </div>
    </div>
@endsection
