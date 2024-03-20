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
<!-- @section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    Products in Cart
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>${{ $product->getPrice() }}</td>
          <td>{{ session('products')[$product->getId()] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="text-end">
        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
        <a class="btn bg-primary text-white mb-2">Purchase</a>
        <a href="{{ route('cart.delete') }}">
          <button class="btn btn-danger mb-2">
            Remove all products from Cart
          </button>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection -->
