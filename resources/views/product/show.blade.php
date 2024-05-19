@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="product-detail mb-5 shadow-sm">
        <div class="row g-0">
            <div class="col-md-5">
                <img src={{ URL::asset($viewData['product']->getImage()) }} class="img-fluid rounded-start" alt="{{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-7">
                <div class="product-detail-body">
                    <h2 class="product-detail-title text-muted">${{ $viewData['product']->getPrice() }}</h2>
                    <p class="product-detail-category mt-4"><strong>Category:</strong> {{ $viewData['product']->getCategory() }}</p>
                    <p class="product-detail-description">{{ $viewData['product']->getDescription() }}</p>
                    <form method="GET" action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}">
                        <div class="row align-items-end">
                            @csrf
                            <div class="col-md-4 mb-3">
                                <label for="quantity" class="form-label">{{ __('products.label.quantity') }}</label>
                                <div class="input-group">
                                    <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1" id="quantity">
                                </div>
                            </div>
                            <div class="col-md-8 mb-3 d-flex align-items-center">
                                <button class="btn btn-lg btn-primary text-white w-100" type="submit">
                                    {{ __('products.button.add_to_cart') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
