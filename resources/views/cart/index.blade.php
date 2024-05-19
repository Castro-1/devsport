@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="custom-card"> 
  <div class="custom-card-header"> 
    {{ __('cart.table.title') }}
  </div> 
  <div class="custom-card-body"> 
    @if (count($viewData["cartProducts"]) > 0)
      <ul class="list-group mb-4">
        @foreach ($viewData["cartProducts"] as $cartProduct)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <img src="{{ URL::asset($cartProduct->getImage()) }}" class="img-thumbnail larger-img me-3" alt="{{ $cartProduct->getName() }}">
            <div>
              <h5 class="mb-1">{{ $cartProduct->getName() }}</h5>
              <p class="mb-1">${{ $cartProduct->getPrice() }}</p>
              <p class="mb-1">{{ __('products.label.quantity') }}: {{ session('cartProducts')[$cartProduct->getId()] }}</p>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <form action="{{ route('cart.remove', $cartProduct->getId())}}" method="POST" class="me-2">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger">
                <i class="bi bi-dash"></i>
              </button>
            </form>
            <form action="{{ route('cart.add', ['id' => $cartProduct->getId()]) }}" method="GET">
              @csrf
              <button class="btn btn-outline-success">
                <i class="bi bi-plus"></i>
              </button>
            </form>
          </div>
        </li>
        @endforeach
      </ul>
      <div class="row">
        <div class="col-md-8">
          <h4><b>{{ __('products.label.total') }}:</b> ${{ $viewData["totalCost"] }}</h4>
        </div>
        <div class="col-md-4 text-end">
          <a href="{{ route('cart.purchase') }}" class="btn btn-primary mb-2">{{ __('products.button.purchase') }}</a> 
          <a href="{{ route('cart.removeAll') }}" class="btn btn-outline-danger mb-2">{{ __('products.button.remove_all_from_cart') }}</a>
        </div>
      </div>
    @else
      <p class="text-center">{{ __('cart.empty') }}</p>
    @endif
  </div> 
</div> 
@endsection
