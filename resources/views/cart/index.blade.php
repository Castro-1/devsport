@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul>
                    @foreach ($viewData['cartProducts'] as $key => $cartProduct)
                    <li>
                        Id: {{ $key }} -
                        {{ __('products.label.name') }}: {{ $cartProduct['product']['name'] }} -
                        {{ __('products.label.price') }}: {{ $cartProduct['product']['price'] }} -
                        {{ __('products.label.quantity') }}: {{ $cartProduct['quantity'] }} -
                        <a href="{{ route('cart.remove', ['id' => $key]) }}">{{ __('products.button.remove_from_cart') }}</a>
                    </li>
                    @endforeach
                </ul>
                @if ($viewData['cartProducts'])
                    <p>{{ __('products.label.quantity') }}: {{ $viewData['totalCost'] }}</p>
                    <a href="{{ route('cart.removeAll') }}">{{ __('products.button.remove_all_from_cart') }}</a>
                @else
                    <p>{{ __('products.cart.empty') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
