<!-- Author: 
    - Juan Esteban Castro
    - Sara María Castrillón Ríos -->
    
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    <title>@yield('title', 'DevSport')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4 custom-navbar">
        <div class="container"  >
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <img src="{{ asset('img/logo2.png') }}" alt="devsport" style="height: 60px; ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Products</a>
                    <a class="nav-link active" href="{{ route('cart.index') }}">
                        {{ __('layout.cart') }}
                        @if (session('cartProducts'))
                            ({{ array_sum(session('cartProducts')) }})
                        @else
                            (0)
                        @endif
                    </a>
                    <a class="nav-link active" href="{{ route('externalproduct.index') }}">Allies</a>


                    <!-- Auth -->
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div> 
                        @guest
                        <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @else
                        <a class="nav-link active" href="{{ route('trainingcontext.index') }}">My Training</a>
                        <!-- <a class="nav-link active" href="{{ route('exercise.index') }}">Exercises</a>  -->
                        <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                            @csrf
                        </form>
                        @endguest
                    </div>                      
                </div>
            </div>
        </div>
    </nav>


    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'DevSport')</h2>
        </div>
    </header>
    <!-- header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- footer -->

    <footer class="footer py-4 text-center text-white">
        <div class="menu-footer">
            <div class="contact-info">
                <strong><p class="title-footer" lang="{{ app()->getLocale() }}">{{ __('footer.contact_information') }}</p></strong>
                <ul>
                    <li lang="{{ app()->getLocale() }}">{{ __('footer.address') }}</li>
                    <li lang="{{ app()->getLocale() }}">{{ __('footer.phone') }}</li>
                    <li lang="{{ app()->getLocale() }}">{{ __('footer.fax') }}</li>
                    <li lang="{{ app()->getLocale() }}">{{ __('footer.email') }}</li>
                </ul>
                <div class="social-icons">
                    <span class="facebook">
                        <i class="bi bi-facebook"></i>
                    </span>
                    <span class="twitter">
                        <i class="bi bi-twitter"></i>
                    </span>
                    <span class="youtube">
                        <i class="bi bi-youtube"></i>
                    </span>
                    <span class="pinterest">
                        <i class="bi bi-pinterest"></i>
                    </span>
                    <span class="instagram">
                        <i class="bi bi-instagram"></i>
                    </span>
                </div>
            </div>

            <div class="information">
                <strong><p class="title-footer" lang="{{ app()->getLocale() }}">{{ __('footer.information') }}</p></strong>
                <ul>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.about_us') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.delivery_information') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.privacy_policies') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.terms_and_conditions') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.contact_us') }}</a></li>
                </ul>
            </div>

            <div class="my-account">
                <strong><p class="title-footer" lang="{{ app()->getLocale() }}">{{ __('footer.my_account') }}</p></strong>
                <ul>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.my_account') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.order_history') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.my_routines') }}</a></li>
                    <li><a href="#" lang="{{ app()->getLocale() }}">{{ __('footer.shopping_cart') }}</a></li>
                </ul>
            </div>
        </div>
</footer>

    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>