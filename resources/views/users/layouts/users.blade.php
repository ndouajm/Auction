<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidout - Auction and Bidding HTML Template</title>
    <link rel="icon" href="{{ asset('users/assets/images/bg/sm-logo.png') }}" type="image/gif" sizes="20x20">
    <link rel="stylesheet" href="{{ asset('users/assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/boxicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('users/assets/css/slick.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/nice-select.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/odometer.css') }}">

    <link rel="stylesheet" href="{{ asset('users/assets/css/style.css') }}">
</head>

<body>

    <div class="preloader style-2">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>



    <div class="mobile-search">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-11">
                    <label>What are you lookking for?</label>
                    <input type="text" placeholder="Search Products, Category, Brand">
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center">
                    <div class="search-cross-btn style-2">

                        <i class="bi bi-x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="style-2">
        <div class="header-logo">
            <a href="index.html"><img alt="image" src="{{ asset('users/assets/images/bg/header-logo2.png') }}"></a>
        </div>
        <div class="main-menu">
            <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
                <div class="mobile-logo-wrap">
                    <a href="index.html"><img alt="image" src="{{ asset('users/assets/images/bg/header-logo2.png') }}"></a>
                </div>
                <div class="menu-close-btn">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="#" class="drop-down">Accueil</a>
                </li>
                <li>
                    <a href="about.html">Apropos</a>
                </li>
                <li>
                    <a href="how-works.html">How It Works</a>
                </li>
                <li>
                    <a href="live-auction.html">Browse Product</a>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>

            <div class="d-lg-none d-block">
                <form class="mobile-menu-form style-2 mb-5">
                    <div class="input-with-btn d-flex flex-column">
                        <input type="text" placeholder="Search here...">
                        <button type="submit" class="eg-btn btn--primary2 btn--sm">Search</button>
                    </div>
                </form>
                <div class="hotline two">
                    <div class="hotline-info">
                        <span>Click To Call</span>
                        <h6><a href="tel:347-274-8816">+347-274-8816</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-right d-flex align-items-center">
            <div class="search-btn">
                <i class="bi bi-search"></i>
            </div>
            <a href="{{ route('admin.dashbord') }}" class="join-btn">Join Merchant</a>

            <div class="eg-btn btn--primary2 header-btn">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth


                        <div class="user-box dropdown">
                            {{-- <a href="" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">My Account</a> --}}
                            <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('users/assets/images/bg/default.jpg') }}" class="user-img img-fluid" alt="user avatar" style="max-height: 20px">
                                <div class="user-info">
                                    <p class="user-name mb-0">{{ auth()->user()->name.' '.auth()->user()->lastname }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center" href="{{ route('user.home') }}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        <i class="bx bx-log-out-circle"></i><span>Deconnexion</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
                    @endauth
                </div>
                @endif
            </div>

            <div class="mobile-menu-btn d-lg-none d-block">
                <i class="bx bx-menu"></i>
            </div>
        </div>
    </header>

    <div class="wrapper">
        @yield('section')
    </div>


    <footer class="style-2">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-xl-3 col-lg-8 col-md-12">
                        <div class="footer-item">
                            <h5>Join Newsletter</h5>
                            <p>Subscribe our newsletter to get more free design course and resource.</p>
                            <form class="mb-30">
                                <div class="input-with-btn d-flex jusify-content-start align-items-strech">
                                    <input type="text" placeholder="Enter your email">
                                    <button type="submit">Subscribe</button>
                                </div>
                            </form>
                            <ul class="footer-social gap-3">
                                <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="#"><i class="bx bxl-twitter"></i></a></li>
                                <li><a href="#"><i class="bx bxl-instagram"></i></a></li>
                                <li><a href="#"><i class="bx bxl-pinterest-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex justify-content-xl-center">
                        <div class="footer-item">
                            <h5>Importants links</h5>
                            <ul class="footer-list">
                                <li><a href="live-auction.html">All Product</a></li>
                                <li><a href="how-works.html">How It Works</a></li>
                                <li><a href="dashboard.html">My Account</a></li>
                                <li><a href="about.html">About Company</a></li>
                                <li><a href="blog.html">Our News Feed</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 d-flex justify-content-xl-center">
                        <div class="footer-item">
                            <h5>Help & FAQs</h5>
                            <ul class="footer-list">
                                <li><a href="product.html">Help Center</a></li>
                                <li><a href="faq.html">Customer FAQs</a></li>
                                <li><a href="login.html">Terms and Conditions</a></li>
                                <li><a href="about.html">Security Information</a></li>
                                <li><a href="blog.html">Merchant Add Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-8 col-md-12">
                        <div class="footer-item">
                            <a href="index.html"><img alt="image" src="assets/images/bg/footer-logo2.png"></a>
                            <ul class="address-list">
                                <li><a href="#">Add. 168/170, Avenue 01, Mirpur DOHS, Bangladesh.</a></li>
                                <li><a href="tel:+029169852">Phone: +029169852 / +88017600000</a></li>
                                <li><a
                                        href="https://demo.egenslab.com/cdn-cgi/l/email-protection#cba2a5ada4e5aeb3aaa6bba7ae8baca6aaa2a7e5a8a4a6">Email:
                                        <span class="__cf_email__"
                                            data-cfemail="b0d9ded6df9ed5c8d1ddc0dcd5f0d7ddd1d9dc9ed3dfdd">[email&#160;protected]</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex align-items-center g-4">
                    <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
                        <p>Copyright 2022 <a href="#">Bid Out</a> | Design By <a href="https://www.egenslab.com/"
                                class="egns-lab">Egens Lab</a></p>
                    </div>
                    <div
                        class="col-lg-6 d-flex justify-content-lg-end justify-content-center align-items-center flex-sm-nowrap flex-wrap">
                        <p class="d-sm-flex d-none">We Accepts:</p>
                        <ul class="footer-logo-list">
                            <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay1.png"></a></li>
                            <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay2.png"></a></li>
                            <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay3.png"></a></li>
                            <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay4.png"></a></li>
                            <li><a href="#"><img alt="image" src="assets/images/bg/footer-pay5.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('users/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('users/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/slick.js') }}"></script>
    <script src="{{ asset('users/assets/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('users/assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('users/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/main.js') }}"></script>
    <script src="{{ asset('users/assets/js/scripts.js') }}"></script>
</body>

<!-- Mirrored from demo.egenslab.com/html/bidout/preview/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Oct 2023 06:34:53 GMT -->

</html>
