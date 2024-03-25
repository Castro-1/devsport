@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="card"> 
  <div class="card-header"> 
    {{ __('cart.products_in_cart') }}
  </div> 
  <div class="card-body"> 
    <table class="table table-bordered table-striped text-center"> 
      <thead> 
        <tr> 
          <th scope="col">ID</th> 
          <th scope="col">{{ __('products.label.name') }}</th> 
          <th scope="col">{{ __('products.label.price') }}</th> 
          <th scope="col">{{ __('products.label.quantity') }}</th>
          <th scope="col">{{ __('products.label.remove') }}</th>
        </tr> 
      </thead> 
      <tbody> 
        @foreach ($viewData["cartProducts"] as $cartProduct) 
        <tr> 
          <td>{{ $cartProduct->getId() }}</td> 
          <td>{{ $cartProduct->getName() }}</td> 
          <td>${{ $cartProduct->getPrice() }}</td> 
          <td>{{ session('cartProducts')[$cartProduct->getId()] }}</td>
          <td>
            <form action="{{ route('cart.remove', $cartProduct->getId())}}" method="POST">
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
    <br> 
    <div class="row"> 
      <div class="text-end"> 
        <a class="btn btn-outline-secondary mb-2"><b>{{ __('products.label.total') }}:</b> ${{ $viewData["totalCost"] }}</a> 
        @if (count($viewData["cartProducts"]) > 0) 
        <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">{{ __('products.button.purchase') }}</a> 
        <a href="{{ route('cart.removeAll') }}"> 
          <button class="btn btn-danger mb-2"> 
            {{ __('products.button.remove_all_from_cart') }}  
          </button> 
        </a>
        @endif 
      </div> 
    </div> 
  </div> 
</div> 
@endsection
