<!-- Author: Juan Esteban Castro, Sara María Castrillón Ríos -->

@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')

<section class="banner">
    <div class="content-banner">
        <a href="">{{ __('home.banner_products') }}</a>
        <a href="">{{ __('home.banner_routine') }}</a>
    </div>
</section>

<main class="main-content">
    <section class="container-features">
        <div class="card-feature">
            <i class="bi bi-gift"></i>
            <div class="feature-content">
                <span>{{ __('home.feature_customized_routines') }}</span>
                <p>{{ __('home.feature_customized_routines_desc') }}</p>
            </div>
        </div>

        <div class="card-feature">
            <i class="bi bi-wallet"></i>
            <div class="feature-content">
                <span>{{ __('home.feature_refund_warranty') }}</span>
                <p>{{ __('home.feature_refund_warranty_desc') }}</p>
            </div>
        </div>

        <div class="card-feature">
            <i class="bi bi-headset"></i>
            <div class="feature-content">
                <span>{{ __('home.feature_purchase_24_7') }}</span>
                <p>{{ __('home.feature_purchase_24_7_desc') }}</p>
            </div>
        </div>
    </section>

    <section class="top-products">
        <h1 class="heading-1">{{ __('home.top_products') }}</h1>

        <div class="container-options">
            <span>{{ __('home.most_recent') }}</span>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    @if($viewData['lastProduct'])
                    <h3 class="mb-3">{{ __('home.new_products') }}</h3>
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src={{ URL::asset($viewData['lastProduct']->getImage()) }} class="card-img"
                                    alt="{{ $viewData['lastProduct']->getName() }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $viewData['lastProduct']->getName() }}</h5>
                                    <p class="card-text">{{ $viewData['lastProduct']->getDescription() }}</p>
                                    <p class="card-text">${{ $viewData['lastProduct']->getPrice() }}</p>
                                    <a href="{{ route('product.show', ['id' => $viewData['lastProduct']->getId()]) }}"
                                        class="btn btn-outline-secondary mb-2">{{ __('home.details_button') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
