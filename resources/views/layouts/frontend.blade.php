<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $setting->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ $setting->favicon }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>

<body>

    <!-- Preloader -->
    {{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</div> --}}

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">

                <!-- Top header -->
                <div class="header-top black-bg d-none d-sm-block">
                    <div class="container">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li class="title"><span class="flaticon-energy"></span> {{ $setting->title }}</li>
                                    <li>{{ $setting->content }}</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span>{{ $setting->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Bottom header -->
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Menu -->
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <nav class="main-menu d-none d-md-block">
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                                        <li><a href="#">{{ __('messages.latest-news') }}</a></li>
                                        <li>
                                            <a href="#">{{ __('messages.pages') }}</a>
                                            <ul class="submenu">
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="#">Blog Details</a></li>
                                                <li><a href="#">Elements</a></li>
                                                <li><a href="#">About</a></li>
                                                <li><a href="#">Contact</a></li>
                                            </ul>
                                        <li><a href="{{ route('dashboard.posts.index') }}">{{ __('messages.create-posts') }}</a></li>
                                        <li>
                                            <a href="#">
                                                <i class="fa-solid fa-earth-americas"></i>
                                                {{ strtoupper(app()->getLocale()) }}
                                            </a>
                                            <ul class="submenu">
                                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <li>
                                                        <a rel="alternate" class="dropdown-item"
                                                            hreflang="{{ $localeCode }}"
                                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                            {{ $properties['native'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        <li></li>
                                        <li>
                                            <a href="#">{{ __('messages.authentication') }}</a>
                                            <ul class="submenu">
                                                <li>
                                                    <a class="nav-link" href="{{ route('login') }}">
                                                        {{ __('auth.login') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="{{ route('register') }}">
                                                        {{ __('auth.register') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="POST"
                                                        style="display:block;">
                                                        @csrf
                                                        <button type="submit" class="nav-link"
                                                            style="all:unset; cursor:pointer; display:block; padding:8px 15px;">
                                                            {{ __('auth.logout') }}
                                                        </button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </li>

                                    </ul>

                                </nav>
                            </div>

                            <!-- Socials / Search -->
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="header-right f-right d-none d-lg-block">
                                    <ul class="header-social">
                                        <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="{{ $setting->instgram }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li><a href="{{ $setting->email }}"><i class="fa-solid fa-envelope"></i></a>
                                        </li>

                                    </ul>
                                    <div class="nav-search search-switch">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <!-- Footer Start -->
        <div class="footer-main footer-bg">

            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">

                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ $setting->favicon }}" class="w-50" alt="">
                                    </a>
                                </div>
                                <p>{{ $setting->content }}</p>
                            </div>
                        </div>

                        <!-- Popular posts -->
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <h4>Popular Post</h4>

                                <div class="whats-right-single mb-20">
                                    <img src="{{ asset('frontend/assets/img/gallery/footer_post1.png') }}"
                                        alt="">
                                    <h4><a href="#">Scarlett’s disappointment...</a></h4>
                                    <p>John | 2 hours ago</p>
                                </div>

                                <div class="whats-right-single mb-20">
                                    <img src="{{ asset('frontend/assets/img/gallery/footer_post2.png') }}"
                                        alt="">
                                    <h4><a href="#">Scarlett’s disappointment...</a></h4>
                                    <p>John | 2 hours ago</p>
                                </div>

                                <div class="whats-right-single mb-20">
                                    <img src="{{ asset('frontend/assets/img/gallery/footer_post3.png') }}"
                                        alt="">
                                    <h4><a href="#">Scarlett’s disappointment...</a></h4>
                                    <p>John | 2 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <!-- Banner -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                            <img src=" {{ $setting->logo }} " class="w-75" alt="">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom-area footer-bg">
                <div class="container text-center">
                    <p>
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        | Production by Mahmoud-Ebrahim
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- Search modal -->
    <div class="search-model-box">
        <div class="d-flex align-items-center h-100 justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/contact.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
