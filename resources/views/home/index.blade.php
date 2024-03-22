@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">{{ __('products.title.new') }}</h3>
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="https://laravel.com/img/logotype.min.svg" class="card-img"
                                alt="{{ $viewData['lastProduct']->getName() }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $viewData['lastProduct']->getName() }}</h5>
                                <p class="card-text">{{ $viewData['lastProduct']->getDescription() }}</p>
                                <p class="card-text">${{ $viewData['lastProduct']->getPrice() }}</p>
                                <a href="{{ route('product.show', ['id' => $viewData['lastProduct']->getId()]) }}"
                                    class="btn bg-primary text-white">{{ __('products.button.details') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
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
        </div>
    </div>
@endsection
