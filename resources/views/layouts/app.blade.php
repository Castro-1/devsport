<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>@yield('title', 'DevSport')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4 custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('img/icon3.jpg') }}" alt="Nombre Alternativo" style="width: 80px; height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    {{-- <a class="nav-link active" href="#">{{ __('About') }}</a> --}}
                    <a class="nav-link active" href="{{ route('product.index') }}">{{ __('Search product') }}</a>
                    <a class="nav-link active" href="{{ route('cart.index') }}">
                        {{ __('layout.cart') }}
                        @if (session('cartProducts'))
                            ({{ array_sum(session('cartProducts')) }})
                        @else
                            (0)
                        @endif
                    </a>
                    <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a> 
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    @guest
                        <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @else
                        <a class="nav-link active" href="{{ route('trainingcontext.index') }}">Your training</a>
                        <a class="nav-link active" href="{{ route('exercise.index') }}">exercises</a> 
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            
        </div>
    </div>
    <!-- footer -->
</body>

</html>
