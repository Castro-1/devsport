@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <form action="{{ route('product.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="{{ __('products.search.placeholder') }}" name="search">
                <button class="btn btn-outline-secondary" type="submit"
                    id="button-addon2">{{ __('products.search.submit') }}</button>
            </div>
        </form>
        <div class="row">
            @if ($viewData['products']->isEmpty())
                <p>{{ __('products.search.not_found') }}</p>
            @else
                @foreach ($viewData['products'] as $product)
                    <div class="col-md-4 col-lg-3 mb-2">
                        <div class="card">
                            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
                            <div class="card-body text-center">
                                <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                                    class="btn bg-primary text-white">{{ $product->getName() }}</a>
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
    @endsection
