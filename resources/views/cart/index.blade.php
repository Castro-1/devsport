@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
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
          <th scope="col">Remove</th> 
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
        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["totalCost"] }}</a> 
        <a class="btn bg-primary text-white mb-2">Purchase</a> 
        <a href="{{ route('cart.removeAll') }}"> 
          <button class="btn btn-danger mb-2"> 
            Remove all products from Cart 
          </button> 
        </a> 
      </div> 
    </div> 
  </div> 
</div> 
@endsection
