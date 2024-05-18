@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Products</h1>
        </div>
    </div>
    <div class="row">
        @if ($viewData['products'])
            <ul>
                @foreach ($viewData['products'] as $product)
                    <li>
                        <h2>{{ $product['name'] }}</h2>
                        <p>Price: ${{ $product['price'] }}</p>
                        <p>Description: {{ $product['description'] }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>{{ __('No products found.') }}</p>
        @endif
    </div>
</div>
@endsection
