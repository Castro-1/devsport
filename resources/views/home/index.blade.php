@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')

        <section class="banner">
			<div class="content-banner">
				<a href="">Products</a>
            	<a href="">Routine</a>
			</div>
		</section>

		<main class="main-content">
        <section class="container-features">
            <div class="card-feature">
                <i class="bi bi-gift"></i>
                <div class="feature-content">
                    <span>Customized Routines</span>
                    <p>Totally adjusted to your needs and goals</p>
                </div>
            </div>
        
            <div class="card-feature">
                <i class="bi bi-wallet"></i>
                <div class="feature-content">
                    <span>Refund Warranty</span>
                    <p>Within 30 days after receiving the package</p>
                </div>
            </div>
            <div class="card-feature">
                <i class="bi bi-headset"></i>
                <div class="feature-content">
                    <span>Place your purchase 24/7</span>
                    <p>Whenever you want, wherever you are!</p>
                </div>
            </div>
        </section>


			<section class="categories">
				<h1>Categories</h1>
				<div class="container-categories">

				    <a class="card-category category-trainig" href="">
						<p>Training</p>
					</a>
					

					<a class="card-category category-accessories" href="">
						<p>Accessories</p>
					</a>

					<a class="card-category category-textile" href="">
						<p>Textile</p>
					</a>

				</div>
			</section>

		

			<section class="top-products">
				<h1 class="heading-1">Top Products</h1>

				<div class="container-options">
					<span>Best Sellers</span>
					<span>Most Recent</span>
				</div>



                <div class="container mt-4">
                    <div class="row">
                        <div class="col-12">
                        @if($viewData['lastProduct'])
                            <h3 class="mb-3">{{ __('products.title.new') }}</h3>
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="https://laravel.com/img/logotype.min.svg" class="card-img" alt="{{ $viewData['lastProduct']->getName() }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $viewData['lastProduct']->getName() }}</h5>
                                            <p class="card-text">{{ $viewData['lastProduct']->getDescription() }}</p>
                                            <p class="card-text">${{ $viewData['lastProduct']->getPrice() }}</p>
                                            <a href="{{ route('product.show', ['id' => $viewData['lastProduct']->getId()]) }}" class="btn btn-outline-secondary mb-2">{{ __('products.button.details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>


              
                    <!-- <div class="row">
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
                                                class="btn btn-outline-secondary mb-2">{{ __('products.button.add_to_cart') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

				 -->
					
					
				</div>
			</section>

			
		</main>





    
@endsection
