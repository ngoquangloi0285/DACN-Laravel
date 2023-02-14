<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title-home')</title>
    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('/assets-frontend/css/style.css') }}">
    <!-- link fontawsome -->
    <link rel="stylesheet" href="{{ asset('/assets-frontend/fontawesome/css/all.min.css') }}">
    <!-- font -->

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;1,400&display=swap');
    </style>
    @yield('heade')

<body>
    <!-- start header -->
    <header>
        <div class="header-top" style="background-color: #F7D716;">
            <div class="container">
                <div class="header social-container">
                    <a href="https://www.facebook.com/LLT.ngoquangloi.real/" target="_blank" class="social-link">
                        <i class="icon fa-brands fa-facebook"></i> </a>
                    <a href="#" class="social-link">
                        <i class="icon fa-brands fa-instagram"></i> </a>
                    <a href="#" class="social-link">
                        <i class="icon fa-brands fa-linkedin"></i> </a>
                    <a href="#" class="social-link">
                        <i class="icon fa-brands fa-twitter"></i> </a>
                </div>

                <div class="header-alert-news">
                    <img width="300" height="100%"
                        src="{{ asset('./assets-frontend/image/chuc-mung-nam-moi-png-5.png') }}" alt="">
                </div>
                <div class="header-top-actions">

                    <select name="currency">

                        <option value="vnd">VND </option>
                        <option value="usd">USD &dollar;</option>

                    </select>

                    <select name="language">

                        <option value="vi-VN">Vietnam</option>
                        <option value="en-US">English</option>

                    </select>

                </div>
            </div>
        </div>
        <div class="header-main">

            <div class="container">

                <a href="{{ route('/') }}" class="header-logo">
                    <h1>ALTT</h1>
                </a>

                <div class="header-search-container">
                    <form class="search-form">
                        <input type="search" name="search" class="search-field"
                            placeholder="Enter your product name...">
                        <button class="search-btn" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="header-user-actions">
                    @if (isset(Auth::user()->name))
                        <div onclick="call()"></div>
                        <button class="action-btn user-btn">
                            <i class="fa fa-user"></i><span>{{ Auth::user()->name }}</span>
                            <div class="nav-user">
                                <ul>
                                    <li><a href="#">Your acccount</a></li>
                                    <li><a href="#">Your order</a></li>
                                    <li> <a href="{{ route('auth.logout') }}">Logout</a></li>
                                    @auth
                                        <li> <a href="{{ route('auth.password') }}">Change password</a></li>
                                    @endauth
                                </ul>
                            </div>
                        </button>
                        <a href="{{route('cart.show')}}" class="action-btn">
                            <i class="fa fa-cart-shopping"></i>
                            <span class="count">
                                {{\Gloudemans\Shoppingcart\Facades\Cart::getContent()->count()}}
                            </span>
                        </a>

                        <a href="#" class="action-btn">
                            <i class="fa fa-heart"></i>
                            <span class="count">0</span>
                        </a>
                    @endif
                    @guest
                        <button class="action-btn user-btn">
                            <i class="fa fa-user"></i><span><i class="fa-solid fa-exclamation"></i></span>
                            <div class="nav-user">
                                <ul>
                                    @if (!isset(Auth::user()->name))
                                        <li><a style="opacity: 0.8" onclick="check()" href="#">Your acccount</a></li>
                                        <li><a style="opacity: 0.8" onclick="check()" href="#">Your order</a></li>
                                    @endif

                                    <li><a style="font-weight: 700" href="{{ route('auth.login') }}">Login</a></li>
                                </ul>
                            </div>
                        </button>
                        <a style="opacity: 0.8" onclick="check()" href="#" class="action-btn">
                            <i class="fa fa-cart-shopping"></i>
                            <span class="count">0</span>
                        </a>

                        <a style="opacity: 0.8" onclick="check()" href="#" class="action-btn">
                            <i class="fa fa-heart"></i>
                            <span class="count">0</span>
                        </a>
                    @endguest
                </div>

            </div>
        </div>

        {{-- category menu --}}
        @yield('nav-header')
        @yield('nav-product_cat')
    </header>
    <!-- end header -->

    <!-- slider main -->
    <div class="slider-main container">
        @yield('slider')
    </div>

    <!-- prduct main  -->
    <div class="product-container">
        @yield('product-home')
    </div>
    <div class="product-container">

        @yield('product-page')
    </div>
    <div class="product-container">
        @yield('cart')
    </div>
    <!-- footer -->
    <footer class="footer">
        {{-- footer menu --}}
        <div class="footer-nav">

            <div class="container-box">

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Contact</h2>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="location-outline" role="img" class="md hydrated"
                                aria-label="location outline"></ion-icon>
                        </div>

                        <address class="content">
                            <i class="icon fa-solid fa-map-location-dot"></i>
                            103 Tang Nhon Phu Street
                            Ho Chi Minh City Vietnam
                        </address>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <i class="icon fa-solid fa-phone"></i>
                        </div>

                        <a href="tel:+84382983095" class="footer-nav-link">(+84) 382983095</a>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <i class="icon fa-solid fa-envelope"></i>
                        </div>

                        <a href="mailto:nqlit2109@gmail.com" class="footer-nav-link">nqlit2109@gmail.com</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Follow Us</h2>
                        <a href="https://www.facebook.com/LLT.ngoquangloi.real/" class="footer-nav-link">Facebook</a>
                    </li>

                    <li>
                        <ul class="social-link">

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-facebook" role="img" class="md hydrated"
                                        aria-label="logo facebook"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-twitter" role="img" class="md hydrated"
                                        aria-label="logo twitter"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-linkedin" role="img" class="md hydrated"
                                        aria-label="logo linkedin"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="#" class="footer-nav-link">
                                    <ion-icon name="logo-instagram" role="img" class="md hydrated"
                                        aria-label="logo instagram"></ion-icon>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>

        </div>
        <div class="footer-bottom">
            <div class="container-box">

                <img src="./assets-frontend/image/footer/payment.png" alt="payment method" class="payment-img">

                <p class="copyright">
                    Copyright © <a href="#">ALTT</a> all rights reserved.
                </p>

            </div>
        </div>
        @yield('footer')
    </footer>
    <!-- icon fontawesome -->
    <script src="{{ asset('./assets-frontend/js/index.js') }}"></script>
    <script src="{{ asset('./assets-frontend/fontawesome/js/all.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
